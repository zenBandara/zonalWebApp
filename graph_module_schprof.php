<link href="/graph_asserts/main.css" rel="stylesheet" type="text/css" />
<link href="/graph_asserts/dvstrtm_jqp_graph.css" rel="stylesheet" type="text/css" />
<script src="https://code.jquery.com/jquery-3.6.0.min.js" type="text/javascript"></script>
<script src="/graph_asserts/dvstrtm_jqp_graph.js" type="text/javascript"></script>
<div class="graph">
    <div class="graph__wrapper">
        <div class="container">
            <br>
            <h2 class="mt-0 center" style="text-align: center; color:#661414;"><span style="color:#ffd400;">RESULTS</span> ANALISIS</h2>
            <br>
            <!-- <div class="graph__header">RESULT ANALYSIS</div> -->
            <div class="graph__block" id="graph_gse"></div>

            <div class="graph__block" id="graph_ol"></div>

            <div class="graph__block" id="graph_al"></div>
            
            <script>
                // Graph for General Scholership Examinations
                jQuery(document).ready(function($) {
                    var color_blue = '#661414';
                    var color_green = '#ffd400';
                        
                    <?php
                    require_once 'php_action/db_connect_client.php';
            
                    $sql = "SELECT year,SUM(gq_pass) as sum_pass,SUM(gq_fail) as sum_fail,SUM(gq_pass+gq_fail) as tot_sat FROM evaluation,school WHERE evaluation.sch_name = school.sch_name and school.census_no= $census_no GROUP BY year";
                    $result = $mysqli->query($sql) or header("location:".$query_err_page);
                    ?>
                    $('#graph_gse').dvstrtm_graph({
                        title: 'The Scholarship Examination',
                        description: 'Grade 5',
                        unit: '<b>X:</b> No.of Students |<b> Y:</b> Year',
                        better: '"Passed" Higher is better',

                        grid_part: 10,
                        separate: true,
                        points: [{
                                title: 'Passed',
                                color: color_blue
                            },
                            {
                                title: 'Failed',
                                color: color_green
                            }
                        ],
                        graphs: [
                            <?php
                            while ($row = $result->fetch_assoc()) {


                            ?>, {
                                    label: '<b><?php echo $row['year']; ?></b><br><b>Passed "%":</b> <?php echo round(($row['sum_pass'] / $row['tot_sat']) * 100, 2); ?><br><b>Failed "%":</b><?php echo round(($row['sum_fail'] / $row['tot_sat']) * 100, 2); ?>',
                                    color: [
                                        color_blue,
                                        color_green,

                                    ],
                                    value: [
                                        <?php echo $row['sum_pass']; ?>,
                                        <?php echo $row['sum_fail']; ?>,

                                    ]
                                },
                            <?php } ?>
                        ]
                    });

                    // Graph for General OL Examinations
                    <?php

                    $sql = "SELECT year,SUM(ol_pass) as sum_pass,SUM(ol_fail) as sum_fail,SUM(ol_pass+ol_fail) as tot_sat FROM evaluation,school WHERE evaluation.sch_name = school.sch_name and school.census_no= $census_no GROUP BY year";
                    $result = $mysqli->query($sql) or header("location:".$query_err_page);
                    ?>
                    $('#graph_ol').dvstrtm_graph({
                        title: 'G.C.E. Ordinary Level (O/L) Examination',
                        description: 'Grade 11',
                        unit: '<b>X:</b> No.of Students |<b> Y:</b> Year',
                        better: '"Passed" Higher is better',
           
                        grid_part: 10,
                        separate: true,
                        points: [{
                                title: 'Passed',
                                color: color_blue
                            },
                            {
                                title: 'Failed',
                                color: color_green
                            }
                        ],
                        graphs: [
                            <?php
                            while ($row = $result->fetch_assoc()) {


                            ?>, {
                                    label: '<b><?php echo $row['year']; ?></b><br><b>Passed "%":</b> <?php echo round(($row['sum_pass'] / $row['tot_sat']) * 100, 2); ?><br><b>Failed "%":</b><?php echo round(($row['sum_fail'] / $row['tot_sat']) * 100, 2); ?>',
                                    color: [
                                        color_blue,
                                        color_green,

                                    ],
                                    value: [
                                        <?php echo $row['sum_pass']; ?>,
                                        <?php echo $row['sum_fail']; ?>,

                                    ]
                                },
                            <?php } ?>
                        ]
                    });

                    // Graph for General AL Examinations

                    <?php

                    $sql = "SELECT year,SUM(al_pass) as sum_pass,SUM(al_fail) as sum_fail,SUM(al_pass+al_fail) as tot_sat FROM evaluation,school WHERE evaluation.sch_name = school.sch_name and school.census_no= $census_no GROUP BY year";
                    $result = $mysqli->query($sql) or header("location:".$query_err_page);
                    ?>
                    $('#graph_al').dvstrtm_graph({
                        title: 'G.C.E. Advanced Level (A/L) Examination',
                        description: 'Grade 13',
                        unit: '<b>X:</b> No.of Students |<b> Y:</b> Year',
                        better: '"Passed" Higher is better',
                     
                        grid_part: 10,
                        separate: true,
                        points: [{
                                title: 'Passed',
                                color: color_blue
                            },
                            {
                                title: 'Failed',
                                color: color_green
                            }
                        ],
                        graphs: [
                            <?php
                            while ($row = $result->fetch_assoc()) {


                            ?>, {
                                    label: '<b><?php echo $row['year']; ?></b><br><b>Passed "%":</b> <?php echo round(($row['sum_pass'] / $row['tot_sat']) * 100, 2); ?><br><b>Failed "%":</b><?php echo round(($row['sum_fail'] / $row['tot_sat']) * 100, 2); ?>',
                                    color: [
                                        color_blue,
                                        color_green,

                                    ],
                                    value: [
                                        <?php echo $row['sum_pass']; ?>,
                                        <?php echo $row['sum_fail']; ?>,

                                    ]
                                },
                            <?php } ?>
                        ]
                    });
                });
            </script>
        </div>
    </div>
</div>