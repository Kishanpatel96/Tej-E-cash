<footer class="footer">
<div class="container">
<div class="footer__first-row">
<div class="footer__get-in-touch">
<div class="footer__get-in-touch__list">
<button type="button" data-label="supportcenter@farstcoin.co" class="footer__get-in-touch__set-mail">
Marketing questions, Support
</button>
<button type="button" data-label="support@farstcoin.com" class="footer__get-in-touch__set-mail">
Contact Business
</button>
</div>
<div class="footer__get-in-touch__bg"></div>
<button type="button" class="footer__get-in-touch__button">
Contact <img src="https://farstcoin.co/resources/assets/img/home/get-in-touch.png" height="15" width="23" />
</button>
<div class="footer__get-in-touch__mail-link" style="overflow: initial !important;">
<i class="fa fa-envelope" aria-hidden="true"></i>
<a href="/cdn-cgi/l/email-protection#e5969095958a979186808b918097a58384979691868a8c8bcb868a" rel="nofollow"><span class="__cf_email__" data-cfemail="">kishanpatelbca96@gmail.com</span></a>
</div>
</div>
<div class="footer__social">
<h6 class="footer__social__title">Follow us</h6>
<div class="footer__social__items">
<a href="https://www.facebook.com/kishanpatel412" target="_blank" class="footer__social__item" rel="nofollow">
<i class="fa fa-facebook" aria-hidden="true"></i>
</a>
<a href="https://twitter.com/KishanP17090099" target="_blank" class="footer__social__item" rel="nofollow">
<i class="fa fa-twitter" aria-hidden="true"></i>
</a>

</div>
</div>
</div>
<div class="footer__second-row">
<div class="footer__links">


<a href="https://github.com/farstnetworkcoin" class="footer__link">Github</a>
</div>
<span class="footer__rights">© 2018 Tej E-cash</span>
</div>
</div>
</footer>

<script data-cfasync="false" src="/assets/js/email-decode.min.js"></script><script type="text/rocketscript" data-rocketsrc="https://farstcoin.co/resources/assets/datatables/jquery.dataTables.min.js"></script>
<script type="text/rocketscript" data-rocketsrc="/assets/js/dataTables.bootstrap.min.js"></script>

<script data-rocketsrc="/assets/js/jquery.fitvids.js" type="text/rocketscript"></script>

<script data-rocketsrc="/assets/js/main.js" type="text/rocketscript"></script>
<script type="text/rocketscript">
        $(document).ready(function(){

            $("#show").DataTable({
                "ajax": {
                    "url": "https://signal.farstcoin.co/api/history",
                    "type": "GET",
                },
                "columns": [
                    { "data": "market" },
                    { "data": "buy_at" },
                    { "data": "result" },
                    { "data": "time_end" },
                    { "data": "status" }
                ]
            });
            $.getJSON('https://signal.farstcoin.co/api/history', function (data) {
                var chart_data = [];
                var win = lose = 0;

                data.data.forEach(function(entry) {
                    day = entry.time_end.slice(0,10);
                    rate = JSON.parse(entry.rate);
                    if(day in chart_data){
                        if(entry.scores == 'Win') {
                            if(win>10){
                                win=0;lose=0;
                            }else{
                                win++;
                            }
                            chart_data[day]['win'] ++;
                            chart_data[day]['rate'] += parseFloat(rate.TF.replace('%',''));
                        }else if((win<=10) & (lose<1)){
                            lose++;
                            chart_data[day]['lose'] ++;
                            chart_data[day]['rate'] += parseFloat(rate.SL.replace('%',''));
                        }
                    }else{
                        chart_data[day] = [];
                        chart_data[day]['win'] = chart_data[day]['lose'] = chart_data[day]['rate'] = 0;
                        if(entry.scores == 'Win') {
                            win=1;lose=0;
                            chart_data[day]['win'] = 1;
                            chart_data[day]['rate'] = parseFloat(rate.TF.replace('%',''));
                        }
                        else{
                            win=0;lose=1;
                            chart_data[day]['lose'] = 1;
                            chart_data[day]['rate'] = parseFloat(rate.SL.replace('%',''));
                        };
                    }
                    
                });                

                var chart_win = [];
                var chart_lose = [];
                var chart_rate = [];
                for (var k in chart_data){
                    if (chart_data.hasOwnProperty(k)) {
                        chart_data_day = new Date(k);
                        chart_win.push([chart_data_day.getTime(),chart_data[k]['win']]);
                        chart_lose.push([chart_data_day.getTime(),chart_data[k]['lose']]);
                        chart_rate.push([chart_data_day.getTime(),chart_data[k]['rate']]);
                    }
                }
                console.log(chart_win);
                Highcharts.stockChart('chartContainer', {
                chart: {
                    backgroundColor:'transparent',
                    style: {
                        fontFamily: 'monospace',
                        color: "#33aee2"
                    }
                },
                    title: {
                        text: '',
                        style: {
                            fontFamily: 'monospace',
                            color: "#33aee2"
                        }
                    },
                    xAxis: {
                        type: 'datetime',
                        title: {
                            style: {
                                fontFamily: 'monospace',
                                color: "#33aee2"
                            }               
                        },
                        labels: {
                            style: {
                                color: '#33aee2'
                            }
                        }


                    },
                    yAxis: [{
                        labels: {
                            style: {
                                color: '#33aee2'
                            }
                        },
                        title: {
                            text: 'Result',
                            style: {
                                fontFamily: 'monospace',
                                color: "#33aee2"
                            }
                        },
                        min: 0,
                        height: '60%',
                        gridLineDashStyle: 'longdash',
                        gridLineColor: 'rgba(51,174,226,0.4)',
                            resize: {
                                enabled: true
                            }
                    },{
                        labels: {
                            style: {
                                color: '#33aee2'
                            }
                        },
                        title: {
                            text: '% Profix',
                            style: {
                                fontFamily: 'monospace',
                                color: "#33aee2"
                            }
                        },
                        top: '65%',
                        height: '35%',
                        gridLineDashStyle: 'longdash',
                        gridLineColor: 'rgba(51,174,226,0.4)',
                        resize: {
                            enabled: true
                        }
                    }],
                    tooltip: {
                        split: true
                    },
                    rangeSelector: {
                        verticalAlign: 'top',
                        x: 0,
                        y: 0,
                        inputBoxBorderColor: '#999'
                    },
                    plotOptions: {
                        series: {
                            showInNavigator: true
                        }
                    },
                    series: [{
                        name: 'Win',
                        color: 'green',
                        type: 'column',
                        data: chart_win
                        

                    }, {
                        name: 'Lose',
                        color: 'red',
                        type: 'column',
                        data: chart_lose

                    }, {
                        name: '%',
                        type: 'line',
                        yAxis: 1,
                        data: chart_rate

                    },]
                });
            });
        });
        </script>

<script type="text/rocketscript" data-rocketsrc="/assets/js/chart/highstock.min.js"></script>
</body>
</html>