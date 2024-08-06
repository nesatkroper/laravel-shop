<x-layout>
  @foreach($add as $a)
  <div
    class="row d-flex justify-content-center align-items-center"
    style="height: 80vh"
  >
    <div class="col-md-4">
      <div class="card">
        <div class="card-header">
          <p class="text-center">Products Information</p>
        </div>
        <div class="card-body">
          <table class="table">
            <tbody>
              <tr>
                <div
                  class="d-flex justify-content-center align-items-center m-2"
                >
                  @if($a->photo)
                  <img
                    src="{{ url('uploads/product/'.$a->photo) }}"
                    alt=""
                    class="rounded-5"
                    style="height: 200px"
                  />
                  @else <img src="{{ url("img/img.jpg") }}" alt=""
                  class="rounded-5" style="height: 200px" /> @endif
                </div>
              </tr>
              <tr>
                <td class="d-flex flex-row justify-content-between">
                  <p>Product Name</p>
                  <p class="fw-bold">:</p>
                </td>
                <td class="fw-bold">{{$a->name}}</td>
              </tr>
              <tr>
                <td class="d-flex flex-row justify-content-between">
                  <p>Product Quantity</p>
                  <p class="fw-bold">:</p>
                </td>
                <td class="fw-bold">{{$a->qty}} pcs</td>
              </tr>
            </tbody>
          </table>
          <form action="{{ route('pro.addto', $a->id) }}" method="post">
            @csrf @method('POST')
            <label for="" class="form-label">Add Product Quantity</label>
            <input type="text" name="add" id="" class="form-control" />
            <label for="" class="form-label">Add Product Price</label>
            <input type="text" name="price" id="" class="form-control" />
            <input type="submit" name="" id="" class="btn btn-success mt-2" />
            <a href="{{ route('pro.index') }}" class="btn btn-danger mt-2"
              >Go Back</a
            >
          </form>
        </div>
      </div>
    </div>
  </div>
  @endforeach
</x-layout>
