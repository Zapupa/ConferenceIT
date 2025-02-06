<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Подача заявки') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('report.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div>
                            <x-input-label for="fullname" :value="__('ФИО')" />
                            <x-text-input id="fullname" class="block mt-1 w-full" type="text" name="fullname" :value="old('fullname')" required autofocus autocomplete="fullname" />
                        </div>
                        <div>
                            <x-input-label for="theme" :value="__('Тема')" />
                            <x-text-input id="theme" class="block mt-1 w-full" type="text" name="theme" :value="old('theme')" required autofocus autocomplete="theme" />
                        </div>
                        <div>
                            <x-input-label for="section_id" :value="__('Секция')" />
                            <select name="section_id" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                @foreach($sections as $section)
                                <option value="{{$section -> id}}" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">{{$section -> title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="pt-5">
                        <x-input-label for="path_img" :value="__('Фото')" />
                            <input type="file" name="path_img" id="path_img" requred="false"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                required />
                        </div>
                        <div class="pt-5">
                            <x-primary-button class="ms-3 flex">
                                {{ __('Отправить заявку') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>