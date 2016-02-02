
// deklarasi path url host
var url = window.location.origin+"/sim_resi/admin/";
//function popover
  $(document).ready(function(){
      $('[data-toggle="popover"]').popover();
  });
//function go back
function goBack()
{
    window.history.back()
}
//tags function
$('.tags').tagsInput({width:'auto'});

// Get data chart
function GetToday(tgl)
{
    var dataString = 'tgl='+ tgl;
    $.ajax({
    type: "POST",
    url: url+"dashboard/get_chart_today",
    data: dataString,
    dataType: 'json',
    cache: false,
    success: function(data){
        var jam = data.jam;
        var total = data.total;
        show_chart('Pengunjung Hari Ini',jam, total);
    }
    });
}

function GetWeek(tgl1, tgl2)
{
    var dataString = 'tgl1='+ tgl1 + '&tgl2='+ tgl2;
    $.ajax({
    type: "POST",
    url: url+"dashboard/get_chart_week",
    data: dataString,
    dataType: 'json',
    cache: false,
    success: function(data){
        var tgl = data.tgl;
        var total = data.total;
        show_chart('Pengunjung Minggu Ini',tgl, total);
    }
    });
}

function GetMonth(tgl)
{
    var dataString = 'tgl='+ tgl;
    $.ajax({
    type: "POST",
    url: url+"dashboard/get_chart_month",
    data: dataString,
    dataType: 'json',
    cache: false,
    success: function(data){
        var tgl = data.tgl;
        var total = data.total;
        show_chart('Pengunjung Bulan Ini',tgl, total);
    }
    });
}

function GetAllTime()
{
    $.ajax({
    type: "POST",
    url: url+"dashboard/get_chart_all",
    cache: false,
    dataType: 'json',
    success: function(data){
        var tgl = data.tgl;
        var total = data.total;
        show_chart('Pengunjung Setiap Tahun',tgl, total);
    }
    });
}

function show_chart(text, kat, total)
{
    $('#containerchart').highcharts({

        title: {
            text: text,
            x: -20 //center
        },
        subtitle: {
            text: 'Source: pondokkode.com',
            x: -20
        },
        xAxis: {
            categories: kat
        },
        yAxis: {
            title: {
                text: 'Total Pengunjung'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        },
        tooltip: {
            valueSuffix: ' Orang'
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        },
        series: [{
            name: 'Pengunjung',
            data: total
        }]
    });
}
