<nav class="hidden md:flex items-center justify-between text-xs">
    <ul class="flex uppercase font-semibold border-b-4 pb-3 space-x-10">
        <li><a  wire:click.prevent="$emit('changedStatus', 'all-ideas')" class="cursor-pointer border-b-4 pb-3 border-blue">All Ideas ({{$count['open']}})</a></li>
        <li><a  wire:click.prevent="$emit('changedStatus', 'considering')" class="cursor-pointer text-gray-400 transition duration-150 ease-in border-b-4 pb-3 hover:border-blue">Considering ({{$count['considering']}})</a></li>
        <li><a  wire:click.prevent="$emit('changedStatus', 'in-progress')" class="cursor-pointer text-gray-400 transition duration-150 ease-in border-b-4 pb-3 hover:border-blue">In Progress ({{$count['in_progress']}})</a></li>
    </ul>
    <ul class="flex uppercase font-semibold border-b-4 pb-3 space-x-10">
        <li><a href="" wire:click.prevent="$emit('changedStatus', 'implemented')" class="cursor-pointer text-gray-400 transition duration-150 ease-in border-b-4 pb-3 hover:border-blue">Implemented ({{$count['implemented']}})</a></li>
        <li><a href="" wire:click.prevent="$emit('changedStatus', 'closed')" class="cursor-pointer text-gray-400 transition duration-150 ease-in border-b-4 pb-3 hover:border-blue">Closed ({{$count['closed']}})</a></li>
    </ul>
</nav>
