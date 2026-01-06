
<!-- Shop Tab -->
<x-shop::tabs position="center">
    <x-shop::tabs.item
        class="container"
        :title="trans('shop::app.general.tab-1')"
        :is-selected="true"
    >
        <div class="container mt-[60px] max-1180:px-[20px]">
            <p class="text-[#6E6E6E] text-[18px] max-1180:text-[14px]">
                Lorem Ipsum is simply dummy text of the printing and typesetting industry.
            </p>
        </div>
    </x-shop::tabs.item>

    <x-shop::tabs.item
        class="container"
        :title="trans('shop::app.general.tab-2')"
    >
        <div class="container mt-[60px] max-1180:px-[20px]">
            <p class="text-[#6E6E6E] text-[18px] max-1180:text-[14px]">
                Lorem Ipsum is simply dummy text of the printing and typesetting industry.
            </p>
        </div>
    </x-shop::tabs.item>
</x-shop::tabs>
