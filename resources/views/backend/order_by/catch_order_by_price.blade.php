<label for="example-text-input" class="col-md-3 col-form-label">Order By Amount</label>
                            <div class="col-md-9">
                                <input class="form-control" type="number" name="order_by_amount" value="{{ $catch_per }}" >
                            </div>
                            <label for="example-text-input" class="col-md-3 col-form-label mt-1">After Order By Amount</label>
                            <div class="col-md-9">
                                <input class="form-control mt-1" type="number" name="after_order_by_amount" value="{{ $final_value }}" >

                                <input class="form-control mt-1" type="hidden" name="per_type" value="{{ $catch_per_type }}" >

                                <input class="form-control mt-1" type="hidden" name="per_name" value="{{ $order_by }}" >
                            </div>
