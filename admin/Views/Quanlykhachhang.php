<?php
//load file layout.php
$this->layoutPath = "Layout.php";
$conn = Connection::getInstance();
$query = $conn->query("select * from customers");
$result = $query->fetchAll();
?>

<div class="pagetitle">
    <h1>Quản lý khách hàng</h1>
    <!-- End Page Title -->
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <div class="search mt-4 mb-4 input-group" style="width:50%">
                        <button class="input-group-text btn btn-success"><i class="fa-solid fa-magnifying-glass"></i></button>
                        <input class="form-control" type="text" id="searchCustomer">
                    </div>

                    <table class="table table-hover table-responsive table-bordered text-center" cellpadding="0" cellspacing="0" border="1" id="sampleTable">
                        <thead>
                            <tr class="table-primary">
                                <th width="10"></th>
                                <th>ID khách hàng</th>
                                <th>Họ và tên</th>
                                <th>Địa chỉ</th>
                                <th>SĐT</th>
                                <th>Gmail</th>
                            </tr>
                        </thead>
                        <tbody id="table-customer">
                            <?php
                            foreach ($result as $row) {
                            ?>
                                <tr>
                                    <td width="10"><input type="checkbox" name="check1" value="1"></td>
                                    <td><?php echo $row->id ?></td>
                                    <td><?php echo $row->name ?></td>
                                    <td><?php echo $row->address ?> </td>
                                    <td><?php echo $row->sodienthoai ?></td>
                                    <td><?php echo $row->email ?></td>

                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $("#searchCustomer").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#table-customer tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>