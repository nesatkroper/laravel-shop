<x-layout>
  <main>
    <div class="container-fluid px-4">
      <h2 class="mt-4">Product Table</h2>
      <button
        class="btn btn-success rounded-3 shadow m-3"
        type="button"
        data-bs-toggle="modal"
        data-bs-target="#staticBackdrop"
        data-bs-whatever="@mdo"
      >
        Add New Product
      </button>

      <div class="card mb-4">
        <div class="card-header">
          <i class="fas fa-table me-1"></i>
          DataTable Example
        </div>
        <div class="card-body">
          <table id="datatablesSimple">
            <thead>
              <tr>
                <th>No</th>
                <th>Photo</th>
                <th>Name</th>
                <th>Category</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Action</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>No</th>
                <th>Photo</th>
                <th>Name</th>
                <th>Category</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Action</th>
              </tr>
            </tfoot>
            <tbody>
              @foreach($pro as $row)
              <tr>
                <td>{{$loop->iteration}}</td>
                <td>
                  @if($row->photo)
                  <img
                    src="{{url('uploads/product/'.$row->photo)}}"
                    alt=""
                    style="height: 50px"
                    class="rounded-3"
                  />
                  @else <img src="{{ url("img/img.jpg") }}" alt=""
                  style="height: 50px;" class="rounded-3"> @endif
                </td>
                <td>{{$row->name}}</td>
                <td>{{$row->cate}}</td>
                <td>$ {{$row->price}}</td>
                <td>{{$row->qty}} pcs</td>
                <td>
                  <!-- Add -->
                  <a
                    href="{{route('pro.add', $row->id)}}"
                    class="btn btn-primary rounded-3 shadow"
                    ><i class="fa fa-plus"></i>Add</a
                  >
                  <!-- Edit -->
                  <a href="" class="btn btn-warning rounded-3 shadow text-white"
                    ><i class="fa fa-plus"></i>Edit</a
                  >
                  <!-- Delete -->
                  <button
                    class="btn btn-danger rounded-3 shadow"
                    type="button"
                    data-bs-toggle="modal"
                    data-bs-target="#staticBackdropDel"
                    data-bs-whatever="@mdo"
                    value="{{$row->id}}"
                  >
                    <i class="fa fa-plus"></i>Delete
                  </button>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <!-- Add Product -->
    <div
      class="modal fade"
      id="staticBackdrop"
      tabindex="-1"
      aria-labelledby="staticBackdropLabel"
      aria-hidden="true"
      data-bs-target="#staticBackdrop"
      data-bs-backdrop="static"
      data-bs-keyboard="false"
    >
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">
              Add New Product
            </h1>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>
          <div class="modal-body">
            <form
              action="{{ route('pro.store') }}"
              method="POST"
              enctype="multipart/form-data"
            >
              @csrf
              <div class="mb-3">
                <label for="recipient-name" class="col-form-label"
                  >Product Name:</label
                >
                <input
                  type="text"
                  class="form-control"
                  id="recipient-name"
                  name="name"
                />
              </div>
              <div class="mb-3">
                <label for="recipient-name" class="col-form-label"
                  >Price:</label
                >
                <input
                  type="text"
                  class="form-control"
                  id="recipient-name"
                  name="price"
                />
              </div>
              <div class="mb-3">
                <label for="recipient-name" class="col-form-label"
                  >Category:</label
                >
                <select name="cate" id="" class="form-select">
                  @foreach($cate as $c)
                  <option value="{{$c->id}}">
                    {{$c->name}}
                  </option>
                  @endforeach
                </select>
              </div>
              <div class="mb-3">
                <label for="recipient-name" class="col-form-label"
                  >Photo:</label
                >
                <input
                  type="file"
                  class="form-control"
                  id="recipient-name"
                  name="photo"
                />
              </div>
              <input
                type="submit"
                name="submit"
                id=""
                class="btn btn-success"
              />
              <button
                type="button"
                class="btn btn-secondary"
                data-bs-dismiss="modal"
              >
                Close
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- Soft Delete -->
    <input id="url" type="hidden" value="{{ \Request::url() }}" />
    <div
      class="modal fade"
      id="staticBackdropDel"
      tabindex="-1"
      aria-labelledby="staticBackdropLabel"
      aria-hidden="true"
      data-bs-target="#staticBackdropDel"
      data-bs-backdrop="static"
      data-bs-keyboard="false"
    >
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">
              Are you sure you want to delete this record?
            </h1>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>
          <div class="modal-body">
            <form
              action="{{route('pro.destroy', $row->id)}}"
              method="POST"
              enctype="multipart/form-data"
            >
              @csrf @method("DELETE")
              <input type="submit" name="submit" id="" class="btn btn-danger" />
              <button
                type="button"
                class="btn btn-secondary"
                data-bs-dismiss="modal"
              >
                Close
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </main>
</x-layout>
