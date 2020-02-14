@if($request->ajax())
    <div class="row align-items-center options">
        <div class="col-sm-4">
            <label class="form-control-label">Options <span class="count">1</span></label>
            <input type="text" name="options[]" class="form-control" placeholder="size">
        </div>
        <div class="col-sm-8">
            <label class="form-control-label">Values</label>
            <input type="text" name="values[]" class="form-control" placeholder="option1 | option2 | option3">
            <label class="form-control-label">Additional Prices</label>
            <input type="text" name="prices[]" class="form-control" placeholder="price1 | price2 | price3">
        </div>
    </div>
@else
    <p class="alert alert-danger">You can't access directly</p>
@endif