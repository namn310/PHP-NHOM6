<?php
include "Model/ProductModel.php";
include "Model/HomeModel.php";
include "Controllers/DiscountController.php";
include "Controllers/VoucherController.php";

class HomeController extends Controller
{
    use ProductModel;
    use HomeModel;
    public function __construct() {}
    public function index()
    {
        //nếu đăng nhập rồi thì mới load view ra không thì sẽ load về trang login
        if (!isset($_SESSION['admin_email'])) {
            $this->loadView("pages-login.php");
        } else {
            $discount = new DiscountController();
            $discount->updateStatusDiscount();
            $discount->updateDiscountProduct();
            $voucher = new VoucherController();
            $voucher->updateStatusVoucher();
            $order = $this->getOrder();
            $product = $this->getHotProduct();
            $productOutCount = $this->ProductOutCount();
            $OrderToday = $this->getOrderToday();
            $customer = $this->getCountCus();
            $sale = $this->getSale();
            //load view
            $this->loadView("HomeAdmin.php", ['order' => $order, 'product' => $product, 'productOutCount' => $productOutCount, 'OrderToday' => $OrderToday, 'customer' => $customer, 'sale' => $sale]);
        }
    }
}
