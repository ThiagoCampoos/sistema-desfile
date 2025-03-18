function getChartColorsArray(e){if(null!==document.getElementById(e)){var t=document.getElementById(e).getAttribute("data-colors");if(t)return(t=JSON.parse(t)).map(function(e){var t=e.replace(" ","");if(-1===t.indexOf(",")){var o=getComputedStyle(document.documentElement).getPropertyValue(t);return o||t}var r=e.split(",");return 2!=r.length?t:"rgba("+getComputedStyle(document.documentElement).getPropertyValue(r[0])+","+r[1]+")"})}}var chartColumnStacked100Colors=getChartColorsArray("sales_figures");chartColumnStacked100Colors&&(options={series:[{name:"Notas Lançadas",data:[44,55,41,67,22,43,21,49,30,18,46,78,34,52]},{name:"Notas Revisadas",data:[13,23,20,8,13,27,33,12,10,18,22,5,10,14]}],dataLabels:{enabled:!1},chart:{type:"bar",height:400,stacked:!0,stackType:"100%",toolbar:{show:!1},borderRadius:30,animations:{enabled:!0,easing:"easeinout",speed:800,animateGradually:{enabled:!0,delay:150},dynamicAnimation:{enabled:!0,speed:350}}},stroke:{width:3,colors:["#fff"]},plotOptions:{bar:{borderRadius:6,columnWidth:"20%"}},responsive:[{breakpoint:850,options:{chart:{height:300},plotOptions:{bar:{columnWidth:"30%"}}}},{breakpoint:620,options:{series:[{data:[44,55,41,67,22,43,21,49,30]},{data:[13,23,20,8,13,27,33,12,10]}],plotOptions:{bar:{columnWidth:"40%"}}}},{breakpoint:480,options:{legend:{position:"bottom",offsetX:-10,offsetY:0}}},{breakpoint:350,options:{series:[{data:[44,55,41,67,22,43,21]},{data:[13,23,20,8,13,27,33]}],plotOptions:{bar:{columnWidth:"50%"}}}}],xaxis:{categories:["Janeiro","Fevereiro","Março","Abril","Maio","Junho","Julho","Agosto","Setembro","Outubro","Novembro","Dezembro"]},title:{text: "Quantidade de Notas",style: { fontWeight: 600 },},fill:{opacity:1},legend:{show:!1},colors:chartColumnStacked100Colors},(chart=new ApexCharts(document.querySelector("#sales_figures"),options)).render());var chartPiePatternColors=getChartColorsArray("pattern_chart");chartPiePatternColors&&(options={series:[44,55,41],chart:{height:220,type:"donut",dropShadow:{enabled:!0,color:"#111",top:-1,left:3,blur:3,opacity:.2}},stroke:{width:0},plotOptions:{pie:{donut:{labels:{show:!0,total:{showAlways:!0,show:!0}}}}},labels:["Aprovado","Em Análise","Negado"],dataLabels:{enabled:!1},fill:{opacity:1,pattern:{enabled:!0,style:["circles","squares","horizontalLines","verticalLines","slantedLines"]}},states:{hover:{filter:"none"}},theme:{palette:"palette2"},legend:{show:!1},colors:chartPiePatternColors,responsive:[{breakpoint:1461,options:{chart:{height:"160px"}}},{breakpoint:1487,options:{chart:{height:"170px"}}},{breakpoint:1517,options:{chart:{height:"184px"}}}]},(chart=new ApexCharts(document.querySelector("#pattern_chart"),options)).render());var chartBarColors=getChartColorsArray("bar_chart");chartBarColors&&(options={chart:{height:100,type:"bar",toolbar:{show:!1}},plotOptions:{bar:{horizontal:!1,columnWidth:"20%"}},dataLabels:{enabled:!1},series:[{data:[380,430,450,475,550,584,780,1100,1220,1365]}],colors:chartBarColors,grid:{show:!1},xaxis:{labels:{show:!1}},yaxis:{show:!1}},(chart=new ApexCharts(document.querySelector("#bar_chart"),options)).render());var chartPieGradientColors=getChartColorsArray("gradient_chart");chartPieGradientColors&&(options={series:[44,55,41,17,15,40,32,28],chart:{height:250,type:"donut"},labels:["Roupas","Decoração ","Cozinha","Jantar","Lazer","Iluminação","Homens","Mulheres "],plotOptions:{pie:{startAngle:-90,endAngle:270}},stroke:{width:5,colors:["#fff"]},dataLabels:{enabled:!1},fill:{type:"gradient"},legend:{show:!1},colors:chartPieGradientColors},(chart=new ApexCharts(document.querySelector("#gradient_chart"),options)).render());var chartNagetiveValuesColors=getChartColorsArray("monthly_states");chartNagetiveValuesColors&&(options={series:[{name:"Cash Flow",data:[1.45,5.42,-.42,-12.6,-18.1,-11.1,-6.09,3.88,13.07,5.8,8.1,-13.57,15.75,17.1,-27.03,-47.2,-43.3,-18.6,-48.6,-41.1,-39.6,-29.4]}],chart:{type:"bar",height:228,toolbar:{show:!1}},plotOptions:{bar:{colors:{ranges:[{from:-100,to:-46,color:chartNagetiveValuesColors[1]},{from:-45,to:0,color:chartNagetiveValuesColors[2]}]},columnWidth:"100%"}},dataLabels:{enabled:!1},colors:chartNagetiveValuesColors[0],yaxis:{labels:{formatter:function(e){return e.toFixed(0)+"k"}}},xaxis:{type:"datetime",categories:["2021-07-01","2021-08-01","2021-09-01","2021-10-01","2021-11-01","2022-01-01","2022-02-01","2022-03-01","2022-04-01","2022-05-01","2022-07-01","2022-08-01","2022-09-01","2022-10-01","2022-11-01","2023-01-01","2023-02-01","2023-03-01","2023-04-01","2023-05-01","2023-07-01","2023-08-01","2023-09-01"],labels:{rotate:-90}},responsive:[{breakpoint:1399,options:{chart:{height:"268px"}}},{breakpoint:1461,options:{chart:{height:"190px"}}},{breakpoint:1565,options:{chart:{height:"200px"}}},{breakpoint:1599,options:{chart:{height:"210px"}}},{breakpoint:1609,options:{chart:{height:"220px"}}}]},(chart=new ApexCharts(document.querySelector("#monthly_states"),options)).render());var chartRadarPolyradarColors=getChartColorsArray("products");chartRadarPolyradarColors&&(options={series:[{name:"Series 1",data:[48,100,40,68,56,80,92]}],chart:{height:400,type:"radar",toolbar:{show:!1}},dataLabels:{enabled:!1},plotOptions:{radar:{size:140,polygons:{strokeColor:"#e8e8e8",fill:{colors:["#f8f8f8","#fff"]}}}},colors:chartRadarPolyradarColors,markers:{size:7,colors:["#fff"],strokeColors:["#38c66c","#74788d","#fe5b5b","#4e7adf","#41c3a9","#ffd166","#343a40"],strokeWidth:5},tooltip:{y:{formatter:function(e){return e}}},xaxis:{categories:["Domingo","Segunda","Terça","Quarta","Quinta","Sexta","Sábado"]},yaxis:{tickAmount:7,labels:{formatter:function(e,t){return t%2==0?e:""}}},responsive:[{breakpoint:420,options:{chart:{height:"300"},plotOptions:{radar:{size:110}}}}]},(chart=new ApexCharts(document.querySelector("#products"),options)).render());var options,chart,chartColumnDumbellColors=getChartColorsArray("user_traffic");chartColumnDumbellColors&&(options={series:[{data:[{x:"4:00",y:[2800,4500]},{x:"5:00",y:[3200,4100]},{x:"6:00",y:[2950,7800]},{x:"7:00",y:[3e3,4600]},{x:"8:00",y:[3500,4100]},{x:"9:00",y:[4500,6500]},{x:"10:00",y:[4100,5600]}]}],chart:{height:400,type:"rangeBar",zoom:{enabled:!1}},plotOptions:{bar:{isDumbbell:!0,columnWidth:3,dumbbellColors:[chartColumnDumbellColors]}},legend:{show:!1},fill:{type:"gradient",gradient:{type:"vertical",gradientToColors:[chartColumnDumbellColors[1]],inverseColors:!0,stops:[0,100]}},grid:{xaxis:{lines:{show:!0}},yaxis:{lines:{show:!1}}},xaxis:{tickPlacement:"on"}},(chart=new ApexCharts(document.querySelector("#user_traffic"),options)).render());var optionsGroup,chartGroup,chartColumnGroupLabelsColors=getChartColorsArray("column_group_labels_dashboard");
chartColumnGroupLabelsColors && (
  optionsGroup = {
    series: [
      {
        name: "faturamento",
        data: [
          { x: "Janeiro", y: 400 }, 
          { x: "Fevereiro", y: 410 },
          { x: "Março", y: 420 },
          { x: "Abril", y: 430 },
          { x: "Maio", y: 440 },
          { x: "Junho", y: 450 },
          { x: "Julho", y: 448 },
          { x: "Agosto", y: 458 },
          { x: "Setembro", y: 468 },
          { x: "Outubro", y: 470 },
          { x: "Novembro", y: 480 },
          { x: "Dezembro", y: 490 }
        ],
      },
    ],
    chart: {
      type: "bar",
      height: 392,
      toolbar: { show: false },
    },
    plotOptions: {
      bar: {
        horizontal: false,
        columnWidth: "45%",
      },
    },
    colors: chartColumnGroupLabelsColors,
    xaxis: {
      type: "category",
      categories: [
        "Janeiro",
        "Fevereiro",
        "Março",
        "Abril",
        "Maio",
        "Junho",
        "Julho",
        "Agosto",
        "Setembro",
        "Outubro",
        "Novembro",
        "Dezembro"
      ],
    },
    tooltip: {
      x: {
        formatter: function (t) {
          return t;
        },
      },
    },
  },
  (chartGroup = new ApexCharts(
    document.querySelector("#column_group_labels_dashboard"),
    optionsGroup
  )).render()
);
var chartColumnStacked100Colors = getChartColorsArray("sales_figures_dashboard");
chartColumnStacked100Colors && (
  options = {
    series: [
      {
        name: "Notas Lançadas",
        data: [
          // Add data for each year
          { x: "2017", y: 44 },
          { x: "2018", y: 55 },
          { x: "2019", y: 41 },
          { x: "2020", y: 67 },
          { x: "2021", y: 22 },
          { x: "2022", y: 43 },
          { x: "2023", y: 21 },
          { x: "2024", y: 49 },
          { x: "Total", y: 300 }, // Calculate the total
        ],
      },
      {
        name: "Notas Revisadas",
        data: [
          { x: "2017", y: 13 },
          { x: "2018", y: 23 },
          { x: "2019", y: 20 },
          { x: "2020", y: 8 },
          { x: "2021", y: 13 },
          { x: "2022", y: 27 },
          { x: "2023", y: 33 },
          { x: "2024", y: 12 },
          { x: "Total", y: 150 }, // Calculate the total
        ],
      },
    ],
    dataLabels: {
      enabled: false,
    },
    chart: {
      type: "bar",
      height: 450,
      stacked: true,
      stackType: "100%",
      toolbar: { show: false },
      borderRadius: 30,
      animations: {
        enabled: true,
        easing: "easeinout",
        speed: 800,
        animateGradually: { enabled: true, delay: 150 },
        dynamicAnimation: { enabled: true, speed: 350 },
      },
    },
    stroke: {
      width: 3,
      colors: ["#fff"],
    },
    plotOptions: {
      bar: {
        borderRadius: 6,
        columnWidth: "40%", // Wider columns for years
      },
    },
    responsive: [
      {
        breakpoint: 850,
        options: {
          chart: { height: 300 },
          plotOptions: { bar: { columnWidth: "50%" } },
        },
      },
      {
        breakpoint: 620,
        options: {
          series: [
            {
              data: [
                // Adjust data based on smaller screen sizes
                44,
                55,
                41,
                67,
                22,
                43,
                21,
                49,
                300, // Total
              ],
            },
            {
              data: [
                13,
                23,
                20,
                8,
                13,
                27,
                33,
                12,
                150, // Total
              ],
            },
          ],
          plotOptions: { bar: { columnWidth: "60%" } },
        },
      },
      {
        breakpoint: 480,
        options: {
          legend: { position: "bottom", offsetX: -10, offsetY: 0 },
        },
      },
      {
        breakpoint: 350,
        options: {
          series: [
            {
              data: [
                44,
                55,
                41,
                67,
                22,
                43,
                21,
                300, // Total
              ],
            },
            {
              data: [
                13,
                23,
                20,
                8,
                13,
                27,
                33,
                150, // Total
              ],
            },
          ],
          plotOptions: { bar: { columnWidth: "70%" } },
        },
      },
    ],
    xaxis: {
      categories: [
        "2017",
        "2018",
        "2019",
        "2020",
        "2021",
        "2022",
        "2023",
        "2024",
        "Total",
      ],
    },
    title: {
        text: "Quantidade de Notas",
        style: { fontWeight: 600 },
    },
    fill: {
      opacity: 1,
    },
    legend: {
      show: false,
    },
    colors: chartColumnStacked100Colors,
  },
  (chart = new ApexCharts(
    document.querySelector("#sales_figures_dashboard"),
    options
  )).render()
);
var chartPiePatternColors=getChartColorsArray("pattern_chart_modal");chartPiePatternColors&&(options={series:[44,55,41],chart:{height:400,type:"donut",dropShadow:{enabled:!0,color:"#111",top:-1,left:3,blur:3,opacity:.2}},stroke:{width:0},plotOptions:{pie:{donut:{labels:{show:!0,total:{showAlways:!0,show:!0}}}}},labels:["Aprovado","Em Análise","Negado"],dataLabels:{enabled:!1},fill:{opacity:1,pattern:{enabled:!0,style:["circles","squares","horizontalLines","verticalLines","slantedLines"]}},states:{hover:{filter:"none"}},theme:{palette:"palette2"},legend:{show:!1},colors:chartPiePatternColors,responsive:[{breakpoint:1461,options:{chart:{height:"600px"}}},{breakpoint:1487,options:{chart:{height:"800px"}}},{breakpoint:1517,options:{chart:{height:"900px"}}}]},(chart=new ApexCharts(document.querySelector("#pattern_chart_modal"),options)).render());
var chartPieBasicColors=getChartColorsArray("simple_pie_chart");chartPieBasicColors&&(options={series:[46,54],chart:{height:250,type:"pie"},dataLabels:{enabled:!1},legend:{show:!1},labels:["Total Revisionado","Total ISSQN"],colors:chartPieBasicColors},(chart=new ApexCharts(document.querySelector("#simple_pie_chart"),options)).render());
var chartPieBasicColors=getChartColorsArray("simple_pie_chart_modal");chartPieBasicColors&&(options={series:[46,54],chart:{height:450,type:"pie"},dataLabels:{enabled:!1},legend:{show:!1},labels:["Total Revisionado","Total ISSQN"],colors:chartPieBasicColors},(chart=new ApexCharts(document.querySelector("#simple_pie_chart_modal"),options)).render());
var chartPieBasicColors=getChartColorsArray("simple_pie_chart_dashboard");chartPieBasicColors&&(options={series:[46,54],chart:{height:172,type:"pie"},dataLabels:{enabled:!1},legend:{show:!1},labels:["Total Revisionado","Total ISSQN"],colors:chartPieBasicColors},(chart=new ApexCharts(document.querySelector("#simple_pie_chart_dashboard"),options)).render());
var chartDonutBasicColors=getChartColorsArray("simple_dount_chart");chartDonutBasicColors&&(options={series:[44,55,41],chart:{height:200,type:"donut",dropShadow:{enabled:!0,color:"#111",top:-1,left:3,blur:3,opacity:.2}},legend:{position:"bottom"},dataLabels:{dropShadow:{enabled:!1}},colors:chartDonutBasicColors},(chart=new ApexCharts(document.querySelector("#simple_dount_chart"),options)).render());
var chartPiePatternColors=getChartColorsArray("pattern_chart_dashboard");chartPiePatternColors&&(options={series:[44,55,41],chart:{height:172,type:"donut",dropShadow:{enabled:!0,color:"#111",top:-1,left:3,blur:3,opacity:.2}},stroke:{width:0},plotOptions:{pie:{donut:{labels:{show:!0,total:{showAlways:!0,show:!0}}}}},labels:["Aprovado","Em Análise","Negado"],dataLabels:{enabled:!1},fill:{opacity:1,pattern:{enabled:!0,style:["circles","squares","horizontalLines","verticalLines","slantedLines"]}},states:{hover:{filter:"none"}},theme:{palette:"palette2"},legend:{show:!1},colors:chartPiePatternColors,responsive:[{breakpoint:1461,options:{chart:{height:"600px"}}},{breakpoint:1487,options:{chart:{height:"800px"}}},{breakpoint:1517,options:{chart:{height:"900px"}}}]},(chart=new ApexCharts(document.querySelector("#pattern_chart_dashboard"),options)).render());

