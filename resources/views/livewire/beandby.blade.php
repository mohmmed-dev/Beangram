<div class="px-5 mb-4">
    @if($this->beans > 0)
    {{__('Keva Beans by')}}
    <strong>
        <a href="//{{$this->firstusername}}">{{$this->firstusername}}</a>
    </strong>
    @endif
    @if($this->beans > 1)
    {{__('and')}}
    <strong>
        {{__('Others')}}
    </strong>
    @endif
</div>
