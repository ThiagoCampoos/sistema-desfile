function getChartColorsArray(t){if(null!==document.getElementById(t)){var e=document.getElementById(t).getAttribute("data-colors");if(e)return(e=JSON.parse(e)).map(function(t){var e=t.replace(" ","");if(-1===e.indexOf(",")){var o=getComputedStyle(document.documentElement).getPropertyValue(e);return o||e}var r=t.split(",");return 2!=r.length?e:"rgba("+getComputedStyle(document.documentElement).getPropertyValue(r[0])+","+r[1]+")"})}}var options,chart,chartColumnRotateLabelsColors=getChartColorsArray("column_rotated_labels");chartColumnRotateLabelsColors&&(options={series:[{name:"$(Currency)",data:[30,68,41,67,18,43,25,33,50,31,87,65]}],annotations:{points:[{x:"Bananas",seriesIndex:0,label:{borderColor:"#775DD0",offsetY:0,style:{color:"#fff",background:"#775DD0"},text:"Bananas are good"}}]},chart:{height:250,type:"bar",toolbar:{show:!1}},plotOptions:{bar:{borderRadius:10,columnWidth:"50%"}},dataLabels:{enabled:!1},stroke:{width:2},colors:chartColumnRotateLabelsColors,xaxis:{labels:{rotate:-45},categories:["JAN","FEB","MARCH","APRIL","MAY","JUNE","JULY","AUG","SEP","OCT","NOV","DEC"],tickPlacement:"on"},yaxis:{title:{text:"Servings"}},fill:{type:"gradient",gradient:{shade:"light",type:"horizontal",shadeIntensity:.25,gradientToColors:void 0,inverseColors:!0,opacityFrom:.85,opacityTo:.85,stops:[50,0,100]}}},(chart=new ApexCharts(document.querySelector("#column_rotated_labels"),options)).render());