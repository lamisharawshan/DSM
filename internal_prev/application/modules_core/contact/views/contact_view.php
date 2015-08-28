<div class="page-content">


    <h4 class="blue">
        <i class="icon-hand-right icon-animated-hand-pointer blue"></i>
        Contact Messages
    </h4>


    <div class="hr hr32 hr-dotted"></div>

    <div class="row-fluid">
        <div class="span12">
            <!--PAGE CONTENT BEGINS-->
            <div class="row-fluid">
                <div class="span12">

                <table id="sample-table-1" class="table table-striped table-bordered table-hover">
                <thead>
                <tr>

                    <th>Name</th>
                    <th>E-mail</th>
                    <th>Message</th>
                    <th>Date</th>
                    <th>Time</th>

                </tr>
                </thead>

                <tbody>
                <?php
                $no_data = 0;
                foreach ($list_of_contact as $row) {
                ?>
                <tr>


                    <td><?php echo $row->name ?></td>
                    <td><?php echo $row->e_mail ?></td>
                    <td><?php echo $row->message ?></td>
                    <td><?php echo $row->date ?></td>
                    <td><?php echo $row->time ?></td>

                    <?php } ?>
                </tr>
                </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>

