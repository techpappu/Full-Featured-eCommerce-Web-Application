<div class="card-box pb-0 overflow-hidden">
    <style>
        ul.all-order-status {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        ul.all-order-status li {
            list-style: none;
            /* border-right:1px solid gray; */
        }

        ul.all-order-status li:after {
            content: '|';
            margin-left: 10px;
        }

        ul.all-order-status li:last-child:after {
            content: '';
        }

        a.disabled {
            color: black;
            pointer-events: none;
        }

    </style>



    <div class="row mb-3 float-right">
        <div class="col-md-10">
            <ul class="all-order-status">
                @foreach($allStatus as $statusName => $count)

                    <li><a href="javascript:void(0);" wire:click="changeStatusQuery('{{ $statusName }}')"
                            class="{{ $statusQuery == $statusName ? 'disabled' : '' }}">{{ $statusName }}
                        </a> ({{ $count }})</li>

                @endforeach
            </ul>
        </div>
        <div class="col-md-2">
            <div>
                <label for="itemShown"> Order Row</label>
                <select name="" wire:model.live="OrderRowNumber" id="itemShown" class="custom-select">
                    <option value="100">100</option>
                    <option value="200">200</option>
                    <option value="300">300</option>
                    <option value="400">400</option>
                    <option value="500">500</option>
                </select>
            </div>
            <div>
                <button class="btn btn-primary ml-3 mt-3 float-right" wire:click="syncOrder">Sync Order</button>
            </div>
        </div>


    </div>

    <x-back-end.message></x-back-end.message>


    <div class="table-responsive" x-data="{
                                            SelectAll:false,
                                            orders:@json($orders->pluck('id')),
                                            toggleSelectAll() {
                                            if(this.SelectAll){
                                                $wire.selected=this.orders
                                            }
                                            else{
                                                $wire.selected=[];
                                            }

                                            },}">
        <form action="" wire:submit.prevent="selectAction">
            <div class="row">
                <div class="col-6">
                    <select class="custom-select w-25" wire:model="actionName">
                        @foreach($allStatus as $statusName => $count)
                            @if ($statusName !='all')
                                <option value="{{ $statusName }}">{{ $statusName }}</option>
                            @endif
                        @endforeach

                    </select>
                    <input type="submit" class="btn btn-outline-primary" value="Apply">
                </div>
                <div class="col-6">
                    <div class="float-right">
                        {{ $orders->links() }}
                    </div>
                </div>
            </div>


            <table class="table table-bordered table-striped mb-0">
                <thead>
                    <tr>
                        <th wire:ignore>
                            <div class="custom-control custom-checkbox" >
                                <input type="checkbox" class="custom-control-input" x-model="SelectAll" x-on:change="toggleSelectAll()"
                                    id="SelectedAll">
                                <label class="custom-control-label" for="SelectedAll">Order ID</label>
                            </div>
                        </th>
                        <th>name</th>
                        <th>Status</th>
                        <th>Phone</th>
                        <th>Total</th>
                        <th>Date</th>
                        <th>Actions</th>

                    </tr>
                </thead>
                <tbody>

                    @csrf
                    @foreach($orders as $row)
                        <tr>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" wire:model="selected" class="custom-control-input" value="{{ $row->id }}"
                                         id="customCheck1-{{ $row->id }}">
                                    <label class="custom-control-label"
                                        for="customCheck1-{{ $row->id }}">{{ $row->wc_visual_order_id }}</label>
                                </div>
                            </td>

                            <td>{{ $row->customer_details->first_name ?? '' }}</a></td>

                            <td>{{ $row->status }}</td>
                            <td>
                                {{ $row->customer_details->phone ?? '' }}
                            </td>

                            <td>{{ $row->total }} BDT</td>
                            <td>
                                {{ $row->created_at->diffForHumans() }}
                            </td>
                            <td>
                                <div class="d-inline">
                                    <a href="" class="btn d-inline-block waves-effect waves-light btn-primary ">
                                        <i class="far fa-edit"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </form>
    </div>

    <div class="mt-2 float-right">
        {{ $orders->links() }}
    </div>
</div>
