<?php
//load file layout.php
$this->layoutPath = "Layout.php";
?>
<div class="pagetitle">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb" style="font-size: 22px;">
            <li class="breadcrumb-item"><a href="index.php?controller=donhang">Danh sách đơn hàng</a></li>
            <li class="breadcrumb-item active" aria-current="page">Xem chi tiết</li>
        </ol>
    </nav>
</div><!-- End Page Title -->
<div class="container-fluid border border-primary rounded">
    <div class="p-4">
        <?php
        $order = $this->modelGetOrders($id);
        $customer = $this->modelGetCustomers($order->customer_id);
        ?>
        <div class="name d-inline-block">
            <span>
                <b>Họ và tên: </b>
                <i><?php echo $customer->name ?></i>
            </span>
        </div>
        <div class="local mt-4 ">
            <span>
                <b>Địa chỉ:</b>
                <i><?php echo $customer->address ?></i>
            </span>
        </div>
        <div class="phone mt-4">
            <span>
                <b>Số điện thoại:</b>
                <i><?php echo $customer->sodienthoai ?></i>
            </span>
        </div>
        <div class="date mt-4">
            <span>
                <b>Ngày đặt</b>
                <i><?php echo $order->create_at ?></i>
            </span>
        </div>
        <div class="local mt-4">
            <span>
                <b>Trạng thái :</b>
                <?php
                if ($order->status > 0) {
                ?>
                    <button class="btn btn-success">Đã giao hàng</button>
                <?php
                } else {
                ?>
                    <button class="btn btn-danger">Chưa giao hàng</button>
                <?php
                } ?>
            </span>
        </div>
        <div class="order-detail mt-4">
            <table class="table table-bordered table-hover text-center">
                <tr>
                    <th style="width: 100px;">Ảnh</th>
                    <th>Sản phẩm</th>
                    <th>Giá</th>
                    <th>Giảm giá</th>
                    <th>Số lượng</th>
                    <th>Thành tiền</th>
                </tr>
                <?php
                foreach ($data as $row) {
                    $product = $this->modelGetProducts($row->product_id)
                ?>
                    <tr>
                        <td>
                            <img class="img-fluid" src="../assets/img-add-pro/<?php echo $this->getMainImage($row->product_id) ?>" style="">
                        </td>
                        <td>
                            <?php echo $product->namePro ?>
                        </td>
                        <td>
                            <?php echo number_format($row->price) ?>
                        </td>
                        <?php
                        if ($product->discount > 0) {
                        ?>
                            <td>
                                <?php echo $product->discount ?>%
                            </td>
                        <?php
                        } else { ?>
                            <td> </td>
                        <?php } ?>
                        <td>
                            <?php echo $row->number ?>
                        </td>
                        <td>
                            <?php
                            if ($product->discount > 0) {
                                echo number_format(($row->number * ($product->giaban - ($product->giaban * ($product->discount / 100)))));
                            } else {
                                echo number_format($row->number * $product->giaban);
                            }
                            ?>
                        </td>
                    </tr>

                <?php
                }
                ?>

            </table>

        </div>
    </div>
</div>
