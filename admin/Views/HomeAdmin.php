<?php
$this->layoutPath = "Layout.php";
include "Model/DonhangModel.php";
?>
<div class="pagetitle">
  <h1>Trang chủ</h1>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <!-- End Navbar -->
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div
                class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                <i class="fa-solid fa-coins" style="color: #FFD43B;"></i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Số đơn hàng hôm nay</p>
                <h4 class="mb-0"><?php echo $OrderToday ?></h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
              <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+55% </span>so với tuần trước</p>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div
                class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                <i class="fa-solid fa-users" style="color: #74C0FC;"></i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Sản phẩm hết hàng</p>
                <h4 class="mb-0"><?php echo $productOutCount ?></h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
              <!-- {{-- <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+3% </span>than
                  lask month</p> --}} -->
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div
                class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                <i class="fa-solid fa-user-check" style="color: #74C0FC;"></i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Tổng số khách hàng</p>
                <h4 class="mb-0"><?php echo $customer ?></h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
              <p class="mb-0"><span class="text-danger text-sm font-weight-bolder">-2%</span> so với hôm qua</p>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div
                class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
                <i class="fa-solid fa-money-check" style="color: #e60f0f;"></i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Doanh thu</p>
                <h4 class="mb-0"><?php echo number_format($sale) ?>đ</h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
              <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+5% </span>so với hôm qua</p>
            </div>
          </div>
        </div>
      </div>
      <div class="row mt-4">
        <div class="col-lg-4 col-md-6 mt-4 mb-4">
          <div class="card z-index-2 ">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
              <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                <div class="chart">
                  <canvas id="chart-bars" class="chart-canvas" height="170"></canvas>
                </div>
              </div>
            </div>
            <div class="card-body">
              <h5 class="mt-2 ">Doanh số tuần</h5>
              <hr class="dark horizontal">
              <div class="d-flex ">
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 mt-4 mb-4">
          <div class="card z-index-2  ">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
              <div class="bg-gradient-success shadow-success border-radius-lg py-3 pe-1">
                <div class="chart">
                  <canvas id="chart-line" class="chart-canvas" height="170"></canvas>
                </div>
              </div>
            </div>
            <div class="card-body">
              <h5 class="mt-2 "> Doanh số tháng </h5>
              <p class="text-sm "> (<span class="font-weight-bolder">+15%</span>) tăng hôm nay. </p>
              <hr class="dark horizontal">
              <div class="d-flex ">
                <!-- {{-- <i class="material-icons text-sm my-auto me-1">schedule</i> --}} -->
                <p class="mb-0 text-sm"> Cập nhật 4 phút trước </p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 mt-4 mb-3">
          <div class="card z-index-2 ">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
              <div class="bg-gradient-dark shadow-dark border-radius-lg py-3 pe-1">
                <div class="chart">
                  <canvas id="chart-line-tasks" class="chart-canvas" height="170"></canvas>
                </div>
              </div>
            </div>
            <div class="card-body">
              <h5 class="mt-2 ">Số lượng truy cập</h5>
              <!-- {{-- <p class="text-sm ">Last Campaign Performance</p> --}} -->
              <hr class="dark horizontal">
              <div class="d-flex ">
                <!-- {{-- <i class="material-icons text-sm my-auto me-1">schedule</i> --}} -->
                <p class="mb-0 text-sm">Vừa cập nhật</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row mb-4">
        <div class="col-lg-12 col-md-12 mb-md-0 mb-4">
          <div class="card" style="border:1px solid black">
            <div class="card-header pb-0">
              <div class="row">
                <div class="col-lg-6 col-7">
                  <h4 class="text-black">Đơn hàng</h4>
                  <!-- {{-- <p class="text-sm mb-0">
                      <i class="fa fa-check text-info" aria-hidden="true"></i>
                      <span class="font-weight-bold ms-1">30 done</span> this month
                    </p> --}} -->
                </div>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive text-center">
                <table class="table align-items-center mb-0">
                  <thead class="table-primary">
                    <tr>
                      <th class=" text-xxs font-weight-bolder opacity-7">
                        Khách hàng</th>
                      <th class=" text-xxs font-weight-bolder opacity-7 ps-2">
                        Số điện thoại</th>
                      <th class="text-center text-xxs font-weight-bolder opacity-7">
                        Thanh toán</th>
                      <th class="text-center text-xxs font-weight-bolder opacity-7">
                        Trạng thái</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($order as $row): ?>
                      <tr>
                        <td>
                          <?php echo $this->getCus($row->customer_id)['name'] ?>
                        </td>
                        <td>
                          <?php echo $this->getCus($row->customer_id)['phone'] ?>
                        </td>
                        <td class="align-middle text-center text-sm">
                          <?php echo $row->payment ?>
                        </td>
                        <?php if ($row->status > 0) { ?>
                          <td class="align-middle text-success">
                            Đơn hàng đã được xác nhận
                          </td>
                        <?php } else { ?>
                          <td class="align-middle text-danger">
                            Đơn hàng chưa được xác nhận
                          </td>
                        <?php } ?>
                      </tr>
                    <?php endforeach ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="card w-100" style="border:1px solid black">
            <div class="card-header pb-0">
              <div class="row">
                <div class="col-lg-6 col-7">
                  <h4 class="text-black">Sản phẩm hot</h4>
                </div>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive">
                <table class="table align-items-center mb-0">
                  <thead class="table-primary">
                    <tr>
                      <th class=" text-xxs font-weight-bolder opacity-7">
                        Tên sản phẩm</th>
                      <th class="">
                        Hình ảnh</th>
                      <th class="text-center text-xxs font-weight-bolder opacity-7">
                        Giảm giá</th>
                      <th class="text-center text-xxs font-weight-bolder opacity-7">
                        Số lượng</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($product as $row): ?>
                      <tr>
                        <td>
                          <?php echo  $row->namePro ?>
                        </td>
                        <td>
                          <img style="max-width:200px;max-height:100px" class="img-fluid"
                            src="../assets/img-add-pro/<?php echo $this->getMainImage($row->idPro) ?>">
                        </td>
                        <?php if ($row->discount > 0) { ?>
                          <td class="align-middle text-center text-sm"><?php echo $row->discount ?>%</td>
                        <?php } else { ?>
                          <td></td>
                        <?php } ?>
                        <td class="align-middle text-center text-sm"><?php echo $row->count ?></td>
                      </tr>
                    <?php endforeach ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
       
      </div>
    </div>
  </main>

</div>
<?php if (isset($_COOKIE["welcome"])) {
  echo ("
    <script>
      $.toast({
        heading: 'Thông báo',
        text: 'Chào mừng trở lại !',
        showHideTransition: 'slide',
        icon: 'success',
        position: 'top-center'
      })
    </script>
    ");
} ?>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  var ctx = document.getElementById("chart-bars").getContext("2d");

  new Chart(ctx, {
    type: "bar",
    data: {
      labels: ["M", "T", "W", "T", "F", "S", "S"],
      datasets: [{
        label: "Sales",
        tension: 0.4,
        borderWidth: 0,
        borderRadius: 4,
        borderSkipped: true,
        backgroundColor: "blue",
        data: [50, 20, 10, 22, 50, 10, 40],
        maxBarThickness: 6
      }, ],
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      plugins: {
        legend: {
          display: false,
        }
      },
      interaction: {
        intersect: false,
        mode: 'index',
      },
      scales: {
        y: {
          grid: {
            drawBorder: true,
            display: true,
            drawOnChartArea: true,
            drawTicks: true,
            borderDash: [5, 5],
            color: ''
          },
          ticks: {
            suggestedMin: 0,
            suggestedMax: 500,
            beginAtZero: true,
            padding: 10,
            font: {
              size: 14,
              weight: 300,
              family: "Roboto",
              style: 'normal',
              lineHeight: 2
            },
            color: "black"
          },
        },
        x: {
          grid: {
            drawBorder: false,
            display: true,
            drawOnChartArea: true,
            drawTicks: false,
            borderDash: [5, 5],
            color: 'rgba(255, 255, 255, .2)'
          },
          ticks: {
            display: true,
            color: 'black',
            padding: 10,
            font: {
              size: 14,
              weight: 300,
              family: "Roboto",
              style: 'normal',
              lineHeight: 2
            },
          }
        },
      },
    },
  });


  var ctx2 = document.getElementById("chart-line").getContext("2d");

  new Chart(ctx2, {
    type: "line",
    data: {
      labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
      datasets: [{
        label: "sales",
        tension: 0,
        borderWidth: 0,
        pointRadius: 5,
        pointBackgroundColor: "blue",
        pointBorderColor: "transparent",
        borderColor: "rgba(255, 255, 255, .8)",
        borderColor: "blue",
        borderWidth: 4,
        backgroundColor: "transparent",
        fill: true,
        data: [50, 40, 300, 320, 500, 350, 200, 230, 500],
        maxBarThickness: 6

      }],
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      plugins: {
        legend: {
          display: false,
        }
      },
      interaction: {
        intersect: false,
        mode: 'index',
      },
      scales: {
        y: {
          grid: {
            drawBorder: false,
            display: true,
            drawOnChartArea: true,
            drawTicks: false,
            borderDash: [5, 5],
            color: 'black'
          },
          ticks: {
            display: true,
            color: 'black',
            padding: 10,
            font: {
              size: 14,
              weight: 300,
              family: "Roboto",
              style: 'normal',
              lineHeight: 2
            },
          }
        },
        x: {
          grid: {
            drawBorder: false,
            display: false,
            drawOnChartArea: false,
            drawTicks: false,
            borderDash: [5, 5]
          },
          ticks: {
            display: true,
            color: 'black',
            padding: 10,
            font: {
              size: 14,
              weight: 300,
              family: "Roboto",
              style: 'normal',
              lineHeight: 2
            },
          }
        },
      },
    },
  });

  var ctx3 = document.getElementById("chart-line-tasks").getContext("2d");

  new Chart(ctx3, {
    type: "line",
    data: {
      labels: ["M", "T", "W", "T", "F", "S", "S"],
      datasets: [{
        label: "person",
        tension: 0,
        borderWidth: 0,
        pointRadius: 5,
        pointBackgroundColor: "red",
        pointBorderColor: "transparent",
        borderColor: "red",
        borderWidth: 4,
        backgroundColor: "transparent",
        fill: true,
        data: [50, 40, 300, 220, 300, 250, 400, 230, 300],
        maxBarThickness: 6

      }],
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      plugins: {
        legend: {
          display: false,
        }
      },
      interaction: {
        intersect: false,
        mode: 'index',
      },
      scales: {
        y: {
          grid: {
            drawBorder: false,
            display: true,
            drawOnChartArea: true,
            drawTicks: false,
            borderDash: [5, 5],
            color: 'black'
          },
          ticks: {
            display: true,
            padding: 10,
            color: 'black',
            font: {
              size: 14,
              weight: 300,
              family: "Roboto",
              style: 'normal',
              lineHeight: 2
            },
          }
        },
        x: {
          grid: {
            drawBorder: false,
            display: false,
            drawOnChartArea: false,
            drawTicks: false,
            borderDash: [5, 5]
          },
          ticks: {
            display: true,
            color: 'black',
            padding: 10,
            font: {
              size: 14,
              weight: 300,
              family: "Roboto",
              style: 'normal',
              lineHeight: 2
            },
          }
        },
      },
    },
  });
</script>