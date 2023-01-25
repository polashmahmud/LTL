<div class="page-body">
    <div class="container-xl">
        <div class="row row-cards">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between items-center">
                        <h3 class="card-title">Users</h3>
                        @if(count($checked) > 0)
                        <div class="d-flex align-items-center space-x-1">
                            <button class="btn btn-white btn-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                     stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none"
                                                                                                                            d="M0 0h24v24H0z"
                                                                                                                            fill="none"/><path
                                        d="M14 3v4a1 1 0 0 0 1 1h4"/><path
                                        d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z"/><line x1="12" y1="11" x2="12"
                                                                                                                          y2="17"/><polyline
                                        points="9 14 12 17 15 14"/></svg>
                                Export ({{ count($checked) }})
                            </button>

                            <button class="btn btn-white btn-sm" wire:click="deleteChecked">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                     viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                     stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <line x1="4" y1="7" x2="20" y2="7"/>
                                    <line x1="10" y1="11" x2="10" y2="17"/>
                                    <line x1="14" y1="11" x2="14" y2="17"/>
                                    <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"/>
                                    <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"/>
                                </svg>
                                Delete ({{ count($checked) }})
                            </button>
                        </div>
                        @endif
                    </div>
                    <div class="card-body border-bottom py-3">
                        <div class="d-flex">
                            <div class="text-muted">
                                Show
                                <div class="mx-2 d-inline-block">
                                    <select class="form-select form-select-sm" wire:model="paginate">
                                        <option value="15">15</option>
                                        <option value="20">20</option>
                                        <option value="50">50</option>
                                        <option value="100">100</option>
                                    </select>
                                </div>
                                entries
                            </div>
                            <div class="ms-auto text-muted">
                                Search:
                                <div class="ms-2 d-inline-block">
                                    <input type="search" class="form-control form-control-sm"
                                           aria-label="Search invoice">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table card-table table-vcenter text-nowrap datatable">
                            <thead>
                            <tr>
                                <th class="w-1">
                                    <input class="form-check-input m-0 align-middle" type="checkbox">
                                </th>
                                @foreach($columns as $column)
                                    <th>{{ $column }}</th>
                                @endforeach
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($this->recores() as $record)
                                <tr class="@if($this->isChecked($record)) table-primary @endif">
                                    <td>
                                        <input value="{{ $record->id }}" wire:model="checked"
                                               class="form-check-input m-0 align-middle" type="checkbox"></td>
                                    @foreach($columns as $column)
                                        <td>{{ $record->$column }}</td>
                                    @endforeach
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="card-footer d-flex align-items-center">
                        <p class="m-0 text-muted">Showing <span>1</span> to <span>8</span> of <span>16</span>
                            entries</p>
                        <div class="m-0 ms-auto">
                            {{ $this->recores()->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
