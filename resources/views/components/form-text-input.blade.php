<div
    class="relative flex-grow"
    x-data>
    @if($type === 'textarea')
        @if($formRef)
            <button type="button" class="absolute top-0 right-0 flex h-full items-center pr-2"
                    @click="$refs['input-{{$name}}'].value=''; $refs['{{$formRef}}'].submit();">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4 text-slate-500">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                </svg>
            </button>
        @endif
        <textarea
            name="{{ $name }}"
            id="{{$name}}"
            @class([
                 'w-full rounded-md border-0 py-1.5 px-2.5 text-sm ring-1 placeholder:text-slate-400',
                 'pr-8' =>$formRef,
                 'ring-slate-300' => !$errors->has($name),
                 'ring-red-500' => $errors->has($name)
             ])
        >
            {{old($name, $value)}}
        </textarea>

    @else
        @if($formRef)
            <button type="button" class="absolute top-0 right-0 flex h-full items-center pr-2"
                    @click="$refs['input-{{$name}}'].value=''; $refs['{{$formRef}}'].submit();">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4 text-slate-500">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                </svg>
            </button>
        @endif
        <input
            x-ref="input-{{$name}}"
            placeholder="{{$placeholder }}"
            name="{{ $name }}"
            value="{{old($name, $value)}}"
            type="{{ $type }}"
            id="{{$name}}"
            @class([
                 'w-full rounded-md border-0 py-1.5 px-2.5 text-sm ring-1 placeholder:text-slate-400',
                 'pr-8' =>$formRef,
                 'ring-slate-300' => !$errors->has($name),
                 'ring-red-500' => $errors->has($name)
             ])
        />

    @endif
    @error($name)
        <p class="text-red-700 mt-1 text-sm">{{$message}}</p>
    @enderror
</div>
