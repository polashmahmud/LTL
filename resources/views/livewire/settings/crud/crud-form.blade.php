<form wire:submit.prevent="submit">
    <div class="card-body">
        <h2 class="mb-4">Simple CRUD Generator</h2>
        <p class="mb-4">This tool will generate a CRUD for you. You can also use it to generate CRUD for your new
            table.</p>
        <div class="row">
            <div class="col">
                <div class="mb-3">
                    <label class="form-label">Model Name</label>
                    <input type="text" wire:model="model" class="form-control @error('model') is-invalid @enderror"
                           placeholder="Model name">
                    @error('model')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col">
                <div class="mb-3">
                    <label class="form-label">Controller Name</label>
                    <input type="text" wire:model="controller" class="form-control @error('controller') is-invalid @enderror"
                           placeholder="Folder name">
                    @error('controller')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col">
                <div class="mb-3">
                    <label class="form-label">Folder Name</label>
                    <input type="text" wire:model="folder" class="form-control @error('folder') is-invalid @enderror"
                           placeholder="Folder name">
                    @error('folder')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <hr>
        <div class="row">
            <div class="col-md-12">
                <h3>Fields</h3>
                <div class="table-responsive">
                    <table class="table table-vcenter table-nowrap">
                        <thead>
                        <tr>
                            <th class="text-nowrap">Name</th>
                            <th class="text-nowrap">Type</th>
                            <th class="text-nowrap">Length</th>
                            <th class="text-nowrap">Not Null</th>
                            <th class="text-nowrap">Default</th>
                            <th class="text-nowrap">Comment</th>
                            <th class="text-nowrap">Input Type</th>
                            <th class="text-nowrap"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($fields as $field)
                            <tr>
                                <td>
                                    <input style="width: 200px" type="text" wire:model="fields.{{ $loop->index }}.name"
                                           class="form-control @error('fields.'.$loop->index.'.name') is-invalid @enderror" placeholder="Name">
                                </td>
                                <td>
                                    <select style="width: 200px" wire:model="fields.{{ $loop->index }}.type"
                                            class="form-select @error('fields.'.$loop->index.'.type') is-invalid @enderror">
                                        <option value="string">String</option>
                                        <option value="text">Text</option>
                                        <option value="integer">Integer</option>
                                        <option value="float">Float</option>
                                        <option value="decimal">Decimal</option>
                                        <option value="boolean">Boolean</option>
                                        <option value="date">Date</option>
                                        <option value="datetime">Datetime</option>
                                        <option value="timestamp">Timestamp</option>
                                        <option value="time">Time</option>
                                        <option value="year">Year</option>
                                        <option value="binary">Binary</option>
                                        <option value="enum">Enum</option>
                                        <option value="json">Json</option>
                                        <option value="jsonb">Jsonb</option>
                                        <option value="uuid">Uuid</option>
                                        <option value="ipAddress">Ip Address</option>
                                        <option value="macAddress">Mac Address</option>
                                        <option value="geometry">Geometry</option>
                                        <option value="point">Point</option>
                                        <option value="linestring">Linestring</option>
                                        <option value="polygon">Polygon</option>
                                        <option value="geometrycollection">Geometrycollection</option>
                                        <option value="multipoint">Multipoint</option>
                                        <option value="multilinestring">Multilinestring</option>
                                        <option value="multipolygon">Multipolygon</option>
                                    </select>
                                </td>
                                <td>
                                    <input style="width: 100px" type="number"
                                           class="form-control @error('fields.'.$loop->index.'.length') is-invalid @enderror" wire:model="fields.{{ $loop->index }}.length"
                                           placeholder="Length">
                                </td>
                                <td>
                                    <select style="width: 70px" wire:model="fields.{{ $loop->index }}.not_null"
                                            class="form-select @error('fields.'.$loop->index.'.not_null') is-invalid @enderror">
                                        <option value="0">No</option>
                                        <option value="1">Yes</option>
                                    </select>
                                </td>
                                <td>
                                    <input style="width: 200px" type="text"
                                           class="form-control @error('fields.'.$loop->index.'.default') is-invalid @enderror"
                                           wire:model="fields.{{ $loop->index }}.default"
                                           placeholder="Default">
                                </td>
                                <td>
                                    <input style="width: 200px" type="text"
                                           class="form-control @error('fields.'.$loop->index.'.comment') is-invalid @enderror"
                                           wire:model="fields.{{ $loop->index }}.comment"
                                           placeholder="Comment">
                                </td>
                                <td>
                                    <select style="width: 200px" wire:model="fields.{{ $loop->index }}.input_type"
                                            class="form-select @error('fields.'.$loop->index.'.input_type') is-invalid @enderror">
                                        <option value="text">Text</option>
                                        <option value="textarea">Textarea</option>
                                        <option value="number">Number</option>
                                        <option value="email">Email</option>
                                        <option value="password">Password</option>
                                        <option value="date">Date</option>
                                        <option value="datetime">Datetime</option>
                                        <option value="time">Time</option>
                                        <option value="select">Select</option>
                                        <option value="radio">Radio</option>
                                        <option value="checkbox">Checkbox</option>
                                        <option value="file">File</option>
                                        <option value="image">Image</option>
                                        <option value="hidden">Hidden</option>
                                    </select>
                                </td>
                                <td>
                                    <button wire:click.prevent="removeColumn({{ $loop->index }})" type="button" class="btn btn-warning btn-sm">
                                        <x-tabler icon="trash"/>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="d-flex justify-content-center align-items-center mt-3">
                    <button wire:click.prevent="addColumn" class="btn btn-success">
                        <x-tabler icon="plus"/>
                        Add new column
                    </button>
                </div>
            </div>
        </div>
    </div>


    <div class="card-footer bg-transparent mt-auto">
        <div class="btn-list justify-content-end">
            <button type="submit" class="btn btn-primary">
                Update Setting
            </button>
        </div>
    </div>
</form>
