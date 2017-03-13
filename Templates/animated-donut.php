<?php

// How to call it:
// animated-donut.php?fontsize=2&percentage=25&width=150&height=150
// &duration=5000&transition=300

$f = $_GET['fontsize'];
$p = $_GET['percentage'];
$w = $_GET['width'];
$h = $_GET['height'];
$d = $_GET['duration'];
$t = $_GET['transition'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Animated Donut with Percentage</title>
<style type="text/css">
@import url(/Design/css/open-sans-font.css);
body {
    width: 100%;
    height: 100%;
    font-family: Lora,"Helvetica Neue",Helvetica,Arial,sans-serif;
    color: #fff;
    background-color: #000;
}
path.color0 {
    fill: #fff;
}
path.color1 {
    fill: rgba(255,255,255,.3);
}
text {
    font-size: <?php echo $f; ?>em;
    font-weight: 400;
    line-height: 16em;
    fill: #fff;
}

</style>
</head>
<body>
<script src="/Design/js/d3.v3.min.js" charset="utf-8"></script>
<script type="text/javascript">
var duration = <?php echo $d; ?>,
    transition = <?php echo $t; ?>,
    percent = <?php echo $p; ?>,
    width = <?php echo $w; ?>,
    height = <?php echo $h; ?>;

var dataset = {
            lower: calcPercent(0),
            upper: calcPercent(percent)
        },
        radius = Math.min(width, height) / 3,
        pie = d3.layout.pie().sort(null),
        format = d3.format(".0%");

var arc = d3.svg.arc()
        .innerRadius(radius * .8)
        .outerRadius(radius);

var svg = d3.select("body").append("svg")
        .attr("width", width)
        .attr("height", height)
        .append("g")
        .attr("transform", "translate(" + width / 2 + "," + height / 2 + ")");

var path = svg.selectAll("path")
                .data(pie(dataset.lower))
                .enter().append("path")
                .attr("class", function (d, i) {
                    return "color" + i
                })
                .attr("d", arc)
                .each(function (d) {
                    this._current = d;
                });

var text = svg.append("text")
        .attr("text-anchor", "middle")
        .attr("dy", ".3em");

var progress = 0;

var timeout = setTimeout(function () {
    clearTimeout(timeout);
    path = path.data(pie(dataset.upper));
    path.transition().duration(duration).attrTween("d", function (a) {
        var i = d3.interpolate(this._current, a);
        var i2 = d3.interpolate(progress, percent)
        this._current = i(0);
        return function (t) {
            text.text(format(i2(t) / 100));
            return arc(i(t));
        };
    });
}, 200);

function calcPercent(percent) {
    return [percent, 100 - percent];
};
</script>