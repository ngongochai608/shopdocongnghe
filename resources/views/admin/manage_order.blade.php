@extends('admin_layout')
@section('admin_content')
    <div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt kê đơn hàng
    </div>
    <div class="row w3-res-tb">
     
     
    
    </div>
    <div class="table-responsive">
                      <?php
                            $message = Session::get('message');
                            if($message){
                                echo '<span class="text-alert">'.$message.'</span>';
                                Session::put('message',null);
                            }
                            ?>
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
           
            <th colspan="2">Thứ tự</th>
            <th colspan="2">Mã đơn hàng</th>
            <th colspan="2">Ngày tháng đặt hàng</th>
            <th colspan="2">Tình trạng đơn hàng</th>
            <th colspan="2">Hành động</th>
          </tr>
        </thead>
        <tbody>
          @php 
          $i = 0;
          @endphp
          @foreach($order as $key => $ord)
            @php 
            $i++;
            @endphp
          <tr>
            <td colspan="2"><p>&ensp;&ensp;{{$i}}</p></label></td>
            <td colspan="2">{{ $ord->order_code }}</td>
            <td colspan="2">{{ $ord->created_at }}</td>
            <td colspan="2">
                @if($ord->order_status==1)
                    Đơn hàng mới
                @elseif($ord->order_status==2) 
                    Đơn hàng đã xử lý
                @else
                    Đơn hàng đã hủy
                @endif
            </td >
           
           
            <td colspan="2">
              <a href="{{URL::to('/view-order/'.$ord->order_code)}}" class="active styling-edit" ui-toggle-class="">
                <i style="color: white;" class="btn btn-success btn-xs fa fa-eye text-success text-active" title="xem chi tiết đơn hàng"> Xem</i></a>&ensp;

              <a onclick="return confirm('Bạn có chắc là muốn xóa đơn hàng này ko?')" href="{{URL::to('/delete-order/'.$ord->order_code)}}" class="active styling-edit" ui-toggle-class="">
                <i style="color: white;" class="btn btn-danger btn-xs fa fa-times text-danger text" title="xóa đơn hàng"> Xóa</i>
              </a>

            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
     <footer class="panel-footer">
      <div class="row">
        
        <div class="col-sm-5 text-center">
          <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
        </div>
        <div class="col-sm-7 text-right text-center-xs">                
          <ul class="pagination pagination-sm m-t-none m-b-none">
            {!!$order->links()!!}
          </ul>
        </div>
      </div>
    </footer>
  </div>
</div>
@endsection