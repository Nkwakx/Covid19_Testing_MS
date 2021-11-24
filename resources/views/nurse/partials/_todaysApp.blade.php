@csrf
<div class="chat-line">
    <span class="chat-date fw-bolder">Today - ({{ $mytime->toFormattedDateString() }})</span>
</div>
@if (is_array($test_logsTodays) || is_object($test_logsTodays))
    @forelse ($test_logsTodays as $log)

    <div class="chat chat-left py-2" style="border:2px dashed #e40b16">
        <div class="chat-body">
            <div class="chat-bubble">
                <div class="chat-content">
                    <span class="chat-user"></span> <span class="chat-time"> {{ $log->log_time }}</span>
                    <p>{{ $log->testRequest->addressLine1 }}, {{ $log->testRequest->addressLine2 }}</p>
                    <p>{{ $log->testRequest->suburb->suburb_name ?? 'No Address Found' }}</p>
                </div>
            </div>
        </div>
    </div>
    @empty
    <h5 class="text-center text-success">You have no appointment for today</h5>
    @endforelse
@endif
<div class="chat-line">
    <span class="chat-date fw-bolder">Tomorrow - ({{ $upcomingAp->toFormattedDateString() }})</span>
</div>
@if (is_array($test_logsTomorrow) || is_object($test_logsTomorrow))
    @forelse ($test_logsTomorrow as $log)

    <div class="chat chat-left py-2"  style="border:2px dashed #0be42f">
        <div class="chat-body">
            <div class="chat-bubble">
                <div class="chat-content">
                    <span class="chat-user"></span> <span class="chat-time "> {{ $log->log_time }}</span>
                    <p>{{ $log->testRequest->addressLine1 }}, {{ $log->testRequest->addressLine2 }}</p>
                    <p>{{ $log->testRequest->suburb->suburb_name ?? 'No Address Found' }}</p>
                </div>
            </div>
        </div>
    </div>
    @empty
    <h5 class="text-center text-success">You have no upcoming appointment</h5>
    @endforelse
@endif
