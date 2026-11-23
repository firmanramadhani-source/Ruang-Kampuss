@extends('layouts.app')

@section('title', 'Ubah Program Beasiswa')

@section('content')
    <main class="mx-auto max-w-6xl px-6 py-12">
        <h1 class="mb-6 font-display text-3xl font-bold text-primary-dark">Ubah Program Beasiswa</h1>

        <form action="{{ route('program.update', $program->id) }}" method="POST" class="grid max-w-xl gap-4 rounded-2xl border border-line bg-card p-6">
            @csrf
            @method('PUT')
            @include('program._form')
        </form>
    </main>
@endsection