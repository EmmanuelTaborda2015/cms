<div class="row-fluid">
    
    <div class="span6">
        <table class="table table-condensed table-bordered">
            <caption><h1>No asignados</h1></caption>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th> </th>
                </tr>
            </thead>
            
            <tbody>
                <?php foreach($query_left as $register): ?>
                <tr>
                    <!--profile id-->
                    <td><?= $register[0]; ?></td>
                    <!--profile name-->
                    <td><?= $register[1]; ?></td>
                    <!--menu id-->
                    <td><?= anchor('menu/assign/' . $register[0] . '/' . $register[2], '<i class="icon-arrow-right"></i>'); ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    
    <div class="span6">
        <table class="table table-condensed table-bordered">
            <caption><h1>Asignados</h1></caption>
            <thead>
                <tr>
                    <th> </th>
                    <th>ID</th>
                    <th>Nombre</th>
                </tr>
            </thead>
            
            <tbody>
                <?php foreach($query_right as $register): ?>
                <tr>
                    <!--menu id-->
                    <td><?= anchor('menu/deny/' . $register[0] . '/' . $register[2], '<i class="icon-arrow-left"></i>'); ?></td>
                    <!--profile id-->
                    <td><?= $register[0]; ?></td>
                    <!--profile name-->
                    <td><?= $register[1]; ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    
</div>

<div class="btn-toolbar">
    <?= anchor('menu/index', "<i class='icon-fast-backward icon-white'></i> Volver", 'class="btn btn-primary"'); ?>
</div>