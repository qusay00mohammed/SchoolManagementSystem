@extends('layouts.master')
@section('css')

@endsection

@section('title')
  {{ __('trans_main.school grade') }}
@stop
@section('page-header')
  <!-- breadcrumb -->
  <div class="page-title">
    <div class="row">
      <div class="col-sm-6">
        <h4 class="mb-0">{{ __('trans_main.school grade') }}</h4>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
          <li class="breadcrumb-item"><a href="#" class="default-color">Home</a></li>
          <li class="breadcrumb-item active">{{ __('trans_main.school grade') }}</li>
        </ol>
      </div>
    </div>
  </div>
  <!-- breadcrumb -->
@endsection
@section('content')
  <!-- row -->
  <div class="row">
    <div class="col-md-12 mb-30">
      <div class="card card-statistics h-100">
        <div class="card-body">
          {{-- Open modal from add grade --}}
          <button type="button" class="button x-small" data-toggle="modal" data-target="#exampleModal">
            {{ trans('trans_grade.add grade') }}
          </button>
          <br><br>
          {{-- end --}}
          <div class="table-responsive">
            <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
              style="text-align: center">
              <thead>
                <tr>
                  <th>#</th>
                  <th>{{ trans('trans_grade.name') }}</th>
                  <th>{{ trans('trans_grade.notes') }}</th>
                  <th>{{ trans('trans_grade.processes') }}</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($grade as $key => $g)
                  <tr>
                    <td>{{ ++$key }}</td>
                    <td>{{ $g->name }}</td>
                    <td>
                        @if ($g->notes == "")
                            {{ __('trans_grade.empty note') }}
                        @else
                            {{ $g->notes }}
                        @endif
                    </td>
                    <td>
                      <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                        data-target="#edit{{ $g->id }}" title="{{ trans('trans_grade.edit grade') }}">
                        <i class="fa fa-edit"></i>
                      </button>
                      <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                        data-target="#delete{{ $g->id }}" title="{{ trans('trans_grade.delete grade') }}">
                        <i class="fa fa-trash"></i>
                      </button>
                    </td>
                  </tr>

                  {{-- Start modal edit grade --}}
                  <div class="modal fade" id="edit{{ $g->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <form action="{{ route('grade.update', [$g->id]) }}" method="POST">
                          @csrf
                          @method('put')
                          <div class="modal-header">
                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                              {{ trans('trans_grade.edit grade') }}
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <div class="row">
                              <div class="col">
                                <label for="name_ar" class="mr-sm-2">{{ trans('trans_grade.name ar') }} :</label>
                                <input id="name_ar" type="text" name="name_ar" class="form-control" required
                                  value="{{ $g->getTranslation('name', 'ar') }}">
                              </div>
                              <div class="col">
                                <label for="name_en" class="mr-sm-2">{{ trans('trans_grade.name en') }} :</label>
                                <input type="text" id="name_en" class="form-control" name="name_en" required
                                  value="{{ $g->getTranslation('name', 'en') }}">
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="exampleFormControlTextarea1">{{ trans('trans_grade.notes') }} :</label>
                              <textarea class="form-control" name="notes" id="exampleFormControlTextarea1" rows="3">{{ $g->notes }}</textarea>
                            </div>
                            <br><br>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary"
                              data-dismiss="modal">{{ trans('trans_grade.close') }}</button>
                            <button type="submit" class="btn btn-success">{{ trans('trans_grade.submit') }}</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  {{-- End modal edit grade --}}

                  {{-- Start modal delete grade --}}
                  <div class="modal fade" id="delete{{ $g->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <form action="{{ route('grade.destroy', [$g->id]) }}" method="POST">
                          @csrf
                          @method('delete')
                          <div class="modal-header">
                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                              {{ trans('trans_grade.delete grade') }}
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <div class="row">
                              <div class="col">
                                <label for="name_ar" class="mr-sm-2">{{ trans('trans_grade.name ar') }} :</label>
                                <input id="name_ar" type="text" name="name_ar" class="form-control" required
                                  value="{{ $g->getTranslation('name', 'ar') }}" disabled>
                              </div>
                              <div class="col">
                                <label for="name_en" class="mr-sm-2">{{ trans('trans_grade.name en') }} :</label>
                                <input type="text" id="name_en" class="form-control" name="name_en" required
                                  value="{{ $g->getTranslation('name', 'en') }}" disabled>
                              </div>
                            </div>

                            <br><br>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary"
                              data-dismiss="modal">{{ trans('trans_grade.close') }}</button>
                            <button type="submit" class="btn btn-danger">{{ trans('trans_grade.delete submit') }}</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  {{-- End modal delete grade --}}
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>


  {{-- Start modal add grade --}}
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form action="{{ route('grade.store') }}" method="POST">
          @csrf
          <div class="modal-header">
            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
              {{ trans('trans_grade.add grade') }}
            </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col">
                <label for="name_ar" class="mr-sm-2">{{ trans('trans_grade.name ar') }} :</label>
                <input id="name_ar" type="text" name="name_ar" class="form-control" required>
              </div>
              <div class="col">
                <label for="name_en" class="mr-sm-2">{{ trans('trans_grade.name en') }} :</label>
                <input type="text" id="name_en" class="form-control" name="name_en" required>
              </div>
            </div>
            <div class="form-group">
              <label for="exampleFormControlTextarea1">{{ trans('trans_grade.notes') }} :</label>
              <textarea class="form-control" name="notes" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <br><br>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary"
              data-dismiss="modal">{{ trans('trans_grade.close') }}</button>
            <button type="submit" class="btn btn-success">{{ trans('trans_grade.submit') }}</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  {{-- End modal add grade --}}

  <!-- row closed -->
@endsection
@section('js')

@endsection
