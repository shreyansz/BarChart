<?php
require_once ('../jpgraph/src/jpgraph.php');
require_once ('../jpgraph/src/jpgraph_bar.php');

class View
{
    static function displayBarGraph($arr, $title, $xTitle, $yTitle)
    {
        $graph = new Graph(1400,920,'auto');
        $graph->SetScale("textlin");
        $graph->SetBox(false);

        $theme_class=new UniversalTheme;
        $graph->SetTheme($theme_class);

        $graph->ygrid->SetFill(false);
        $graph->yaxis->SetLabelAngle(90);
        $graph->yaxis->SetFont(FF_ARIAL,FS_BOLD,18);
        $graph->yaxis->SetTickPositions(array(300,600,900,1200,1500), array(450,750,1050,1350));
        $graph->yaxis->SetTitle($yTitle, "middle");
        $graph->yaxis->title->SetFont(FF_ARIAL,FS_BOLD,18);
        $graph->yaxis->SetTitlemargin(40);
        $graph->yaxis->HideLine(false);
        $graph->yaxis->HideTicks(false,false);

        $graph->xaxis->SetFont(FF_ARIAL,FS_BOLD,18);
        $graph->xaxis->SetTickLabels(array_keys($arr));
        $graph->xaxis->SetTitle($xTitle, "center");
        $graph->xaxis->title->SetFont(FF_ARIAL,FS_BOLD,18);
        $graph->xaxis->SetTitlemargin(20);

        // Create the bar plots
        $barplot = new BarPlot(array_values($arr));
        $graph->Add($barplot);
        $barplot->SetColor("white");
        $barplot->SetFillColor("#cc1111");
        $barplot->SetValuePos('center');

        $graph->title->SetFont(FF_ARIAL,FS_BOLD,48);
        $graph->title->Set($title);
        $graph->title->SetMargin(30);
        $graph->SetMargin(220,180,130,90);
        $graph->Stroke();
    }
}
