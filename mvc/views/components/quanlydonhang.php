<h3 style="margin:70px 0 30px 30px; text-align: center">Quản lý đơn hàng</h3>
<table class="table table-striped" style="width: 95%;margin: 0 auto;">
  <thead>
    <tr>
      <th scope="col">STT</th>
      <th scope="col">Tên</th>
      <th scope="col">Số điện thoại</th>
      <th scope="col">Ngày đặt hàng</th>
      <th scope="col">Tổng số tiền</th>
      <th scope="col">Trạng thái</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $countOrderItem = count($data["orderItem"]);
    if ($countOrderItem == 0) {
      echo '<tr>
        <td colspan="7" style="text-align: center;">Chưa có đơn hàng</td>
      </tr>';
    }
    for ($i = 0; $i < $countOrderItem; $i++) {
      echo '<tr>
        <td>' . ($i + 1) . '</td>
        <td><a href="http://localhost/SPhone/Home/viewOrder/' . $data["orderItem"][$i]["id"] . '">' . $data["orderItem"][$i]["fullname"] . '</a></td>
        <td>' . $data["orderItem"][$i]["phone"] . '</td>
        <td>' . $data["orderItem"][$i]["created_at"] . '</td>
        <td>' . number_format($data["orderItem"][$i]["total_money"]) . ' đ</td>
        <td>';
      if ($data["orderItem"][$i]["status"] == 0)
        echo 'Chờ duyệt';
      else if ($data["orderItem"][$i]["status"] == 1) echo "Đang giao hàng";
      else if ($data["orderItem"][$i]["status"] == 4) echo "Đã thanh toán";
      else echo "Giao dịch hoàn tất!";
      echo '</td>';
      if ($data["orderItem"][$i]["status"] != 3)
        echo '<td><a href="http://localhost/SPhone/Home/confirmOrder/' . $data["orderItem"][$i]["id"] . '/' . $user["id"] . '"><button class="btn btn-danger">Đã nhận hàng</button><a/></td>
      </tr>';
    }
    ?>
  </tbody>
</table>