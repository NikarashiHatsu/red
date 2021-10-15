<div class="relative h-full overflow-y-auto rounded-b-2xl">
    <div class="relative flex items-center justify-between bg-green-500 text-white py-4 px-3 shadow-lg z-50">
        <span class="font-semibold">
            Toko
        </span>
        <i class="fas fa-shopping-cart"></i>
    </div>

    <div class="aspect-w-16 aspect-h-7 border-b"></div>

    <div class="px-4 mt-4">
        <div class="flex">
            <div class="flex flex-col w-16">
                <div class="w-16 h-16 border rounded-full"></div>
            </div>
            <div class="flex flex-col ml-4 w-full">
                <p>
                    Nama Toko
                </p>
                <a href="javascript:void(0)" class="mt-1 text-xs">
                    <i class="fas fa-map-marker-alt fa-sm mr-1"></i>
                    <span>
                        Lorem ipsum dolor sit amet consectetur adipisicing
                        elit. Enim fuga rem veritatis molestias eius sint
                        quisquam.
                    </span>
                </a>
            </div>
            <div class="flex flex-col ml-4">
                <a href="javascript:void(0)" class="flex items-center mt-1 text-xs">
                    <i class="fab fa-whatsapp fa-sm mr-1"></i>
                    <span>WhatsApp</span>
                </a>
                <a href="javascript:void(0)" class="flex items-center mt-1 text-xs">
                    <i class="fab fa-youtube fa-sm mr-1"></i>
                    <span>YouTube</span>
                </a>
                <a href="javascript:void(0)" class="flex items-center mt-1 text-xs">
                    <i class="fab fa-instagram fa-sm mr-1"></i>
                    <span>Instagram</span>
                </a>
                <a href="javascript:void(0)" class="flex items-center mt-1 text-xs">
                    <i class="fab fa-twitter fa-sm mr-1"></i>
                    <span>Twitter</span>
                </a>
            </div>
        </div>
    </div>

    <div class="mt-4 border-t border-b bg-green-50 border-green-200 py-4 text-xs px-4">
        <span>
            20 Produk
        </span>
        <div class="grid grid-cols-3 grid-flow-row gap-4 mt-4">
            @for ($i = 0; $i < 20; $i++)
                <div class="flex flex-col border rounded">
                    <div class="aspect-w-1 aspect-h-1 border-b">
                        <div class="w-full h-full"></div>
                    </div>
                    <div class="flex flex-col bg-white p-2">
                        <p>
                            Nama Produk
                        </p>
                        <p class="font-semibold mt-1">
                            Rp10.000,-
                        </p>
                    </div>
                </div>
            @endfor
        </div>
    </div>

    <div class="mt-4 px-4 pb-4">
        <p class="text-xs">
            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quod amet
            quisquam officia veniam ipsam iste nesciunt quidem, quis earum ut
            eaque esse aperiam labore dolor libero necessitatibus, sequi velit
            illum.
        </p>
    </div>
</div>