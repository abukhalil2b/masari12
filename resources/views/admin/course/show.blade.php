<x-app-layout>
    <style>
        .spinner {
            display: none;
            width: 24px;
            height: 24px;
            border: 2px solid rgba(0, 0, 0, 0.1);
            border-radius: 50%;
            border-left-color: orange;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }
    </style>

    <div class="p-3 w-full h-16 text-green-700 bg-green-50 border border-green-700 text-xl flex justify-between">
        <div>
            <div class="text-xs">البرنامج:</div>
            {{ $course->title }}
        </div>
    </div>

    <div x-data="sortableList()">
        <div class="sortable">
            @foreach($course->activeCircles as $circle)
            <div :data-id="{{ $circle->id }}" draggable="true" @dragstart="drag($event)" @dragover.prevent @drop="drop($event)" class="sortable-item p-1 block font-bold mt-1 cursor-move w-full border rounded {{ $circle->status == 'close' ? 'bg-gray-100 border-gray-200 text-gray-300' : 'border-red-800  bg-red-50' }}">
                {{ $circle->title }}
            </div>
            @endforeach
        </div>

        <!-- Update button -->
        <div class="mt-4 flex gap-2">
            <button class="btn btn-sm btn-outline-warning" @click="updateOrder">تحديث الترتيب</button>
            <div id="spinner" class="spinner"></div>
        </div>
    </div>

    <script>
        function sortableList() {
            return {
                draggingElement: null,

                // When dragging starts, store the dragged item
                drag(event) {
                    this.draggingElement = event.target;
                },

                // When the item is dropped, swap elements
                drop(event) {
                    const draggingItem = this.draggingElement;
                    const targetItem = event.target;

                    // Check if the target item is the first item (to handle dropping at the top)
                    const parent = draggingItem.parentNode;
                    const firstItem = parent.firstElementChild;

                    if (targetItem === firstItem) {
                        // If dropped on the first item, move dragging item to the top
                        parent.insertBefore(draggingItem, firstItem);
                    } else {
                        // Otherwise, move it to the position after the target item
                        parent.insertBefore(draggingItem, targetItem.nextSibling);
                    }
                },

                // Update the item order in the database
                updateOrder() {
                    document.getElementById('spinner').style.display = 'block';

                    const orderedIds = Array.from(document.querySelectorAll('.sortable-item'))
                        .map((el) => el.getAttribute('data-id'));

                    console.log(orderedIds)
                    fetch('/api/update-circle-order', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            },
                            body: JSON.stringify({
                                ordered_ids: orderedIds,
                            }),
                        })
                        .then(response => response.json())
                        .then(data => {

                            console.log('Order updated successfully');
                            document.getElementById('spinner').style.display = 'none';
                        });
                }
            };
        }
    </script>


</x-app-layout>