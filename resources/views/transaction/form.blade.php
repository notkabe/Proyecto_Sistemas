<div class="row padding-1 p-1">
    <div class="col-md-12">
        <div class="row padding-1 p-1">
            <!-- Cantidad -->
            <div class="col-md-12">
                <label for="amount">Amount</label>
                <input type="number" step="0.01" name="amount"
                    class="form-control{{ $errors->has('amount') ? ' is-invalid' : '' }}"
                    value="{{ old('amount', $transaction->amount) }}">
                {!! $errors->first('amount', '<div class="invalid-feedback">:message</div>') !!}
            </div>

            <!-- Tipo de transacción -->
            <div class="col-md-12">
                <label for="type">Transaction type</label>
                <select name="type" class="form-control{{ $errors->has('type') ? ' is-invalid' : '' }}">
                    <option value="">Select one</option>
                    @foreach(['deposit' => 'Deposit', 'withdrawal' => 'Withdrawal', 'transfer' => 'Transfer', 'payment' => 'Payment'] as $key => $value)
                        <option value="{{ $key }}" {{ old('type', $transaction->type) == $key ? 'selected' : '' }}>
                            {{ $value }}
                        </option>
                    @endforeach
                </select>
                {!! $errors->first('type', '<div class="invalid-feedback">:message</div>') !!}
            </div>

            <!-- Moneda -->
            <div class="col-md-12">
                <label for="currency">Currency</label>
                <input type="text" name="currency"
                    class="form-control{{ $errors->has('currency') ? ' is-invalid' : '' }}"
                    value="{{ old('currency', $transaction->currency) }}">
                {!! $errors->first('currency', '<div class="invalid-feedback">:message</div>') !!}
            </div>


            <div class="col-md-12 mt20 mt-2">
                <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
            </div>
        </div>