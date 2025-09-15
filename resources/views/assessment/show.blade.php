{{-- filepath: resources/views/assessment/show.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h2>{{ $assessment->title }}</h2>
    <form>
        @foreach($questions as $question)
            <div class="mb-4">
                <p><strong>{{ $question->text }}</strong></p>
                @foreach($question->options as $option)
                    <label>
                        <input
                            type="radio"
                            name="answers[{{ $question->id }}]"
                            value="{{ $option['value'] }}"
                            {{ (isset($answers[$question->id]) && $answers[$question->id] == $option['value']) ? 'checked' : '' }}
                        >
                        {{ $option['label'] }}
                    </label><br>
                @endforeach
            </div>
        @endforeach
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection