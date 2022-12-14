<div>
  @if ($catchError)
    <div class="alert alert-danger" id="success-danger">
      <button type="button" class="close" data-dismiss="alert">x</button>
      {{ $catchError }}
    </div>
  @endif


  @if ($show_table)
    @include('livewire.parent.parent-table')
  @else
    <div class="stepwizard">
      <div class="stepwizard-row setup-panel">
        <div class="stepwizard-step">
          <a href="#step-1" type="button"
            class="btn btn-circle {{ $currentStep != 1 ? 'btn-default' : 'btn-success' }}">1</a>
          <p>{{ trans('trans_parent.step1') }}</p>
        </div>
        <div class="stepwizard-step">
          <a href="#step-2" type="button"
            class="btn btn-circle {{ $currentStep != 2 ? 'btn-default' : 'btn-success' }}">2</a>
          <p>{{ trans('trans_parent.step2') }}</p>
        </div>
        <div class="stepwizard-step">
          <a href="#step-3" type="button"
            class="btn btn-circle {{ $currentStep != 3 ? 'btn-default' : 'btn-success' }}" disabled="disabled">3</a>
          <p>{{ trans('trans_parent.step3') }}</p>
        </div>
      </div>
    </div>

    @include('livewire.parent.father-form')

    @include('livewire.parent.mother-form')


    {{-- Upload Attrachment - Step 3 - --}}
    @if ($currentStep == 3)
      <div class="row setup-content" id="step-3">
        <div class="col-xs-12">
          <div class="col-md-12"><br>
            <label style="color: red">{{ trans('trans_parent.attachments') }}</label>
            <div class="form-group">
              <input type="file" wire:model="photos" accept="image/*" multiple>
            </div>
            <br>

            <button class="btn btn-danger btn-sm nextBtn btn-lg pull-right" type="button" wire:click="back">
              {{ trans('trans_parent.back') }}
            </button>

            @if ($updateMode)
              <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" wire:click="submitForm_edit"
                type="button">
                {{ trans('trans_parent.edit') }}
              </button>
            @else
              <button class="btn btn-success btn-sm btn-lg pull-right" wire:click="submitForm" type="button">
                {{ trans('trans_parent.save') }}
              </button>
            @endif

          </div>
        </div>
      </div>
    @endif

  @endif
