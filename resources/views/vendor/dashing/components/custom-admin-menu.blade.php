@can('read-sample')
<x-dashing::nav-link :href="route('sample')" :active="request()->routeIs('sample')">
    <i class="align-middle fas fa-link text-dark"></i><span class="align-middle">Samples</span>
</x-dashing::nav-link>
@endcan

<!--DoNotRemoveMe-->
