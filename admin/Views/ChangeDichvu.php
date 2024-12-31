<?php
//load file layout.php
$this->layoutPath = "Layout.php";
?>

<div class="pagetitle">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb" style="font-size: 22px;">
            <li class="breadcrumb-item"><a href="index.php?controller=dichvu">Quản lý dịch vụ</a></li>
            <li class="breadcrumb-item active" aria-current="page">Xem chi tiết</li>
        </ol>
    </nav>

</div><!-- End Page Title -->
<div class="container-fluid border border-primary rounded"> <?php
                                                            foreach ($data as $row) {
                                                            ?>
        <form method="post" action="index.php?controller=dichvu&action=changePost&id=<?php echo $row->id_dichvu ?>" class="p-4">

            <div class="name">

                <label class="form-label"><b>Tên dịch vụ </b> </label>
                <input class="form-control" type="text" name="name" value="<?php echo $row->ten_dichvu ?>">
            </div>
            <div class="mt-4">

                <label class="form-label"><b>Mô tả </b> </label>
                <img class="mt-2 mb-2 img-fluid" src="../assets/img-dichvu/<?php echo $row->hinhanh ?>">
                <input class="form-control" type="file" name="hinhanh">
            </div>

        <?php } ?>
        <button type="submit" class="btn btn-success mt-2">Xác nhận</button>
        </form>
</div>

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
