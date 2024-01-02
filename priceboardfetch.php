<?php


include 'db.inc.php';

if(isset($_POST['changeDate'])){ ?>


<?php 

$changeDate = $_POST['changeDate'];


?>


<table id="table_collect2" class="table table-bordered dt-responsive wrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th rowspan="3" style="text-align: center; vertical-align: middle; background-color: #FFADAD; color: #432616;">Commodity</th>
                                            <th rowspan="3" style="text-align: center; vertical-align: middle; background-color: #E4F1EE; color: #432616;">Production Cost</th>
                                            <th colspan="5" style="text-align: center; vertical-align: middle; background-color: green; color: white;">Farmgate Price</th>
                                            <th colspan="6" style="text-align: center; vertical-align: middle; background-color: #DA9100; color: white;">Wholesale Price</th>
                                            <th colspan="2" style="text-align: center; vertical-align: middle; background-color: #1338BE; color: white;">Social Retail Price</th>
                                            <th rowspan="3" style="text-align: center; vertical-align: middle; background-color: #DEDAF4; color: #432616;">Prevailing Market Price</th>
                                        </tr>
                                        <tr>
                                            <th rowspan="2" style="text-align: center; vertical-align: middle; background-color: green; color: white;">Mark-up (%)</th>
                                            <th style="text-align: center; vertical-align: middle; background-color: green; color: white;">Static (Php/kg)</th>
                                            <th colspan="3" style="text-align: center; vertical-align: middle; background-color: green; color: white;">Dynamic (Php/kg)</th>
                                            <th rowspan="2" style="text-align: center; vertical-align: middle; background-color: #DA9100; color: white;">Mark-up (%)</th>
                                            <th rowspan="2" style="text-align: center; vertical-align: middle; background-color: #DA9100; color: white;">Processing Cost (Php/kg)</th>
                                            <th style="text-align: center; vertical-align: middle; background-color: #DA9100; color: white;">Static (Php/kg)</th>
                                            <th colspan="3" style="text-align: center; vertical-align: middle; background-color: #DA9100; color: white;">Dynamic (Php/kg)</th>
                                            <th rowspan="2" style="text-align: center; vertical-align: middle; background-color: #1338BE; color: white;">Mark-up (%)</th>
                                            <th rowspan="1" style="text-align: center; vertical-align: middle; background-color: #1338BE; color: white;">Dynamic (Php/kg)</th>
                                        </tr>
                                        <tr>
                                            <th style="text-align: center; vertical-align: middle; background-color: green; color: white;">Class A</th>
                                            <th style="text-align: center; vertical-align: middle; background-color: #3DED97; color: black;">Class A</th>
                                            <th style="text-align: center; vertical-align: middle; background-color: #3DED97; color: black;">Class B</th>
                                            <th style="text-align: center; vertical-align: middle; background-color: #3DED97; color: black;">Class C</th>
                                            <th style="text-align: center; vertical-align: middle; background-color: #DA9100; color: white;">Class A</th>
                                            <th style="text-align: center; vertical-align: middle; background-color: #FFDF00; color: black;">Class A</th>
                                            <th style="text-align: center; vertical-align: middle; background-color: #FFDF00; color: black;">Class B</th>
                                            <th style="text-align: center; vertical-align: middle; background-color: #FFDF00; color: black;">Class C</th>
                                            <th style="text-align: center; vertical-align: middle; background-color: #63C5DA; color: black;">Class A</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        include 'db.inc.php';
                                        $query001 = mysqli_query($conn, "SELECT * FROM comm_pospricenew WHERE comm_date_f='$changeDate' ORDER BY comm_f ASC");
                                        while ($result001 = mysqli_fetch_array($query001)) :
                                        ?>
                                            <tr>
                                                <?php
                                                $comm_fgp_f = $result001['comm_fgp_f'];
                                                $comm_fgp_fb = $comm_fgp_f * 0.75;
                                                $comm_fgp_fc = $comm_fgp_f * 0.50;

                                                $comm_wsp_f = $result001['comm_wsp_f'];
                                                $comm_wsp_fb = $comm_wsp_f * 0.75;
                                                $comm_wsp_fc = $comm_wsp_f * 0.50;

                                                $comm_srp_f = $result001['comm_srp_f'];

                                                $comm_prod = $result001['comm_prod'];
                                                $comm_fgp_markup = (($comm_fgp_f - $comm_prod) / $comm_prod) * 100;

                                                $comm_priv = $result001['comm_priv'];
                                                ?>
                                                <td style='background-color: #FFADAD; color: #432616;'><div id='comm_f'><?php echo $result001['comm_f']; ?></div></td>
                                                <td style="text-align: center; vertical-align: middle; background-color: #E4F1EE; color: #432616;"><div id='comm_prod'><?php echo $result001['comm_prod']; ?></div></td>
                                                <td style="text-align: center; vertical-align: middle; background-color: <?php echo ($comm_fgp_markup < 0) ? 'red' : 'green'; ?>; color: white;"><div id='comm_prod_m'><?php echo number_format($comm_fgp_markup); ?>%</div></td>
                                                <td style="text-align: center; vertical-align: middle; background-color: green; color: white;"><div id='comm_fgp'><?php echo number_format($result001['comm_fgp'], 2); ?></div></td>
                                                <td style="text-align: center; vertical-align: middle; background-color: #3DED97; color: black;"><div id='comm_fgp_f'><?php echo number_format($comm_fgp_f, 2); ?></div></td>
                                                <td style="text-align: center; vertical-align: middle; background-color: #3DED97; color: black;"><div id='comm_fgp_fb'><?php echo number_format($comm_fgp_fb, 2); ?></div></td>
                                                <td style="text-align: center; vertical-align: middle; background-color: #3DED97; color: black;"><div id='comm_fgp_fc'><?php echo number_format($comm_fgp_fc, 2); ?></div></td>
                                                <td style="text-align: center; vertical-align: middle; background-color: #DA9100; color: white;"><div id='comm_wspm_f'><?php echo number_format($result001['comm_wspm_f']); ?>%</div></td>
                                                <td style="text-align: center; vertical-align: middle; background-color: #DA9100; color: white;"><div id='comm_wsppc_f'><?php echo number_format($result001['comm_wsppc_f'], 2); ?></div></td>
                                                <td style="text-align: center; vertical-align: middle; background-color: #DA9100; color: white;"><div id='comm_wsp'><?php echo number_format($result001['comm_wsp'], 2); ?></div></td>
                                                <td style="text-align: center; vertical-align: middle; background-color: #FFDF00; color: black;"><div id='comm_wsp_f'><?php echo number_format($comm_wsp_f, 2); ?></div></td>
                                                <td style="text-align: center; vertical-align: middle; background-color: #FFDF00; color: black;"><div id='comm_wsp_fb'><?php echo number_format($comm_wsp_fb, 2); ?></div></td>
                                                <td style="text-align: center; vertical-align: middle; background-color: #FFDF00; color: black;"><div id='comm_wsp_fc'><?php echo number_format($comm_wsp_fc, 2); ?></div></td>
                                                <td style="text-align: center; vertical-align: middle; background-color: #1338BE; color: white;"><div id='comm_srpm_f'><?php echo number_format($result001['comm_srpm_f']); ?>%</div></td>
                                                <td style="text-align: center; vertical-align: middle; background-color: #63C5DA; color: black;"><div id='comm_srp_f'><?php echo number_format($comm_srp_f, 2); ?></div></td>
                                                <td style="text-align: center; vertical-align: middle; background-color: #DEDAF4; color: #432616;"><div id='comm_priv'><?php echo number_format($comm_priv, 2); ?></div></td>
                                            </tr>
                                        <?php endwhile; ?>
                                    </tbody>
                     
                             

                                </table>



<?php } ?>

