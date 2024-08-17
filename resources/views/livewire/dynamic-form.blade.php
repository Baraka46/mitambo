<div>
    <form>
        <div>
            <label for="godown">Godown:</label>
            <select wire:model="selectedGodown" id="godown">
                <option value="">Select Godown</option>
                @foreach($godowns as $godown)
                    <option value="{{ $godown->id }}">{{ $godown->name }}</option>
                @endforeach
            </select>
        </div>

        @if (!is_null($selectedGodown))
        <div>
            <label for="section">Section:</label>
            <select wire:model="selectedSection" id="section">
                <option value="">Select Section</option>
                @foreach($sections as $section)
                    <option value="{{ $section->id }}">{{ $section->name }}</option>
                @endforeach
            </select>
        </div>
        @endif

        @if (!is_null($selectedSection))
        <div>
            <label for="row">Row:</label>
            <select wire:model="selectedRow" id="row">
                <option value="">Select Row</option>
                @foreach($rows as $row)
                    <option value="{{ $row->id }}">{{ $row->name }}</option>
                @endforeach
            </select>
        </div>
        @endif
    </form>
</div>
