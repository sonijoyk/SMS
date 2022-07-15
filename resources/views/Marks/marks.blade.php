<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Student Managment System') }}
        </h2>
     
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                  @if (session('status'))
                  <div class="alert alert-success" role="alert">
                      {{ session('status') }}
                  </div>
              @endif
              <div class="d-none d-md-block main-nav-links">
                <ul class="nav nav-pills nav-fill form-tabs" role="tablist">
                  <li class="nav-item">
                      <a class="main-link nav-link active create" data-toggle="tab" href="#create" role="tab">
                          <span>Add Student Mark</span>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a class="main-link nav-link list" data-toggle="tab" href="#list" role="tab">
                          <span>List all </span>
                      </a>
                  </li>
                </ul>
              </div>
              <div class="d-none d-md-block">
                  <div class="tab-content mt-2">
                    @include('Marks.create')
                    @include('Marks.list')
                  </div>                     
              </div>
            </div>
        </div>
    </div>
</x-app-layout>
