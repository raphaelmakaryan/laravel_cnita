@extends('layouts.miromiro')
@section('title', "Graphique")
@section('content')


<section class="mt-5 mb-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <p class="fs-4 text-center">
                    Graphiques
                </p>
            </div>
        </div>
        <div class="row mt-5 mb-5">
            <div class="col-12 col-lg-6">
                <input type="hidden" id="graphLabels" value='@json($graphLabels)'>
                <input type="hidden" id="graphDataCommandes" value='@json($graphDataCommandes)'>
                <div id="chartCommande"></div>
            </div>
            <div class="col-12 col-lg-6">
                <input type="hidden" id="dataPrix" value='@json($graphDataPrix)'>
                <div id="chartPrix"></div>
            </div>
        </div>
    </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
    const labels = JSON.parse(document.getElementById("graphLabels").value);
    const data = JSON.parse(document.getElementById("graphDataCommandes").value); 
    const dataPrix = JSON.parse(document.getElementById("dataPrix").value);
    const formattedLabels = labels.map(date => new Date(date).toLocaleDateString('fr-FR', { day: '2-digit', month: '2-digit' }));

    const options = {
        series: [{
            name: 'Nombre de commandes',
            data: data
        }],
        chart: {
            type: 'bar',
            height: 350
        },
        plotOptions: {
            bar: {
                horizontal: false,
                columnWidth: '55%',
                borderRadius: 5,
                borderRadiusApplication: 'end'
            },
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            show: true,
            width: 2,
            colors: ['transparent']
        },
        xaxis: {
            categories: formattedLabels,
        },
        yaxis: {
            title: {
                text: 'n (commandes)'
            }
        },
        fill: {
            opacity: 1
        },
    };

    const chartCommande = new ApexCharts(document.querySelector("#chartCommande"), options);
    chartCommande.render();

    const optionsPrix = {
            series: [{
                name: 'Total des prix (€)',
                data: dataPrix
            }],
            chart: {
                type: 'bar',
                height: 350
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: '55%',
                    borderRadius: 5,
                    borderRadiusApplication: 'end'
                },
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                show: true,
                width: 2,
                colors: ['transparent']
            },
            xaxis: {
                categories: formattedLabels,
            },
            yaxis: {
                title: {
                    text: '€ (prix total)'
                }
            },
            fill: {
                opacity: 1
            },
        };

        const chartPrix = new ApexCharts(document.querySelector("#chartPrix"), optionsPrix);
        chartPrix.render();

</script>

@stop