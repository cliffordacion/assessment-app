@extends('layouts.app')

@section('content')

<div class="google-form-container">
    <div class="form-header">
        <h2>{{ $assessment->title }}</h2>
    </div>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('assessment.submit', $assessment->id) }}">
        @csrf
        @foreach($questions as $question)
            <div class="question-card">
                <p class="fw-bold">{{ $question->text }}</p>
                @foreach($question->options as $option)
                    <div class="form-check">
                        <input
                            class="form-check-input"
                            type="radio"
                            name="answers[{{ $question->id }}]"
                            value="{{ $option['value'] }}"
                            id="q{{ $question->id }}_{{ $option['value'] }}"
                            {{ (isset($answers[$question->id]) && $answers[$question->id] == $option['value']) ? 'checked' : '' }}
                        >
                        <label class="form-check-label" for="q{{ $question->id }}_{{ $option['value'] }}">
                            {{ $option['label'] }}
                        </label>
                    </div>
                @endforeach
            </div>
        @endforeach
        <div class="submit-button-container">
            <button type="submit" class="btn btn-google-form">Submit</button>
        </div>
    </form>
</div>
@endsection
