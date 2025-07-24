<?php for($i=0;$i<count($result[2]);$i++): ?>
<div class="row" style="justify-content:center">
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-8">
        <table class="table table-bordered ">
            <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="col">Statistic</th>
                    <?php for($j=0;$j<count($result[2][$i]['result']);$j++): ?>
                        <th scope="col" style="font-weight:500"><?php echo $result[2][$i]['result'][$j]['name'] ?></th>
                    <?php endfor ?>
                    <th scope="col">Total</th>
                </tr>
            </thead>
            <tbody>
            <tr>
                <th scope="row" rowspan="2" style="width:300px"><?php echo $result[2][$i]['quiz'] ?></th>
                <td style="width:70px">N</td>
                <?php for($j=0;$j<count($result[2][$i]['result']);$j++): ?>
                    <td class="text-success" style="font-size:1.2rem; font-weight:500;"><?php echo $result[2][$i]['result'][$j]['counts'] ?></td>
                <?php endfor ?>
            
                <td class="text-success" style="width:50px;font-size:1.2rem; font-weight:500"><?php echo $result[1]; ?></td>
            </tr>
            <tr>
                <td>Percent</td>
                <?php for($j=0;$j<count($result[2][$i]['result']);$j++): ?>
                    <td class="text-info" style="font-weight:500;font-size: 1.1rem;"><?php echo round($result[2][$i]['result'][$j]['counts']/$result[1]*100) ?>%</td>
                <?php endfor ?>
            
                <td class="text-info" style="font-weight:500;font-size: 1.1rem;">100%</td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
<?php endfor ?>