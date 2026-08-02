@php
    $calendarEvents = [];
    foreach ($upcoming as $item) {
        $d = \Carbon\Carbon::parse($item->date)->format('Y-m-d'); // adjust field name if needed
        $calendarEvents[$d]['upcoming'] = true;
    }
    foreach ($completed as $item) {
        $d = \Carbon\Carbon::parse($item->date)->format('Y-m-d');
        $calendarEvents[$d]['completed'] = true;
    }
    foreach ($cancelled as $item) {
        $d = \Carbon\Carbon::parse($item->date)->format('Y-m-d');
        $calendarEvents[$d]['cancelled'] = true;
    }
@endphp

<div class="sidebar-calendar" id="sideCalendar" data-events='@json($calendarEvents)'>
    <div class="cal-header">
        <h6 class="cal-title mb-0"><i class="bi bi-calendar3"></i> Appointments</h6>
        <div class="cal-nav">
            <button type="button" class="cal-nav-btn" id="calPrev"><i class="bi bi-chevron-left"></i></button>
            <span class="cal-month-label" id="calMonthLabel"></span>
            <button type="button" class="cal-nav-btn" id="calNext"><i class="bi bi-chevron-right"></i></button>
        </div>
    </div>

    <div class="cal-weekdays">
        <span>S</span><span>M</span><span>T</span><span>W</span><span>T</span><span>F</span><span>S</span>
    </div>

    <div class="cal-grid" id="calGrid"></div>

    <div class="cal-legend">
        <span class="legend-item"><i class="dot dot-upcoming"></i> Upcoming</span>
        <span class="legend-item"><i class="dot dot-completed"></i> Completed</span>
        <span class="legend-item"><i class="dot dot-cancelled"></i> Cancelled</span>
    </div>
</div>

<style>
.sidebar-calendar{background-color:var(--bg-card);border:1px solid var(--border-color);border-radius:16px;padding:1.25rem;color:var(--text-main);font-family:var(--font-family);}
.cal-header{display:flex;align-items:center;justify-content:space-between;margin-bottom:1rem;flex-wrap:wrap;gap:.5rem;}
.cal-title{font-size:.95rem;font-weight:700;display:flex;align-items:center;gap:6px;}
.cal-title i{color:var(--primary);}
.cal-nav{display:flex;align-items:center;gap:.5rem;}
.cal-nav-btn{width:28px;height:28px;border-radius:50%;border:1px solid var(--border-color);background:var(--form-input-bg,var(--bg-body));color:var(--text-main);display:flex;align-items:center;justify-content:center;cursor:pointer;font-size:.75rem;transition:all .2s ease;}
.cal-nav-btn:hover{background:var(--primary);border-color:var(--primary);color:#fff;}
.cal-month-label{font-size:.85rem;font-weight:600;color:var(--text-main);min-width:110px;text-align:center;}
.cal-weekdays{display:grid;grid-template-columns:repeat(7,1fr);text-align:center;font-size:.72rem;color:var(--text-muted);font-weight:600;margin-bottom:.4rem;}
.cal-grid{display:grid;grid-template-columns:repeat(7,1fr);gap:2px;}
.cal-day{position:relative;aspect-ratio:1/1;display:flex;flex-direction:column;align-items:center;justify-content:center;border-radius:8px;font-size:.8rem;color:var(--text-main);cursor:default;transition:background .2s ease;}
.cal-day.is-outside{color:var(--text-muted);opacity:.35;}
.cal-day.has-event{cursor:pointer;}
.cal-day.has-event:hover{background:var(--form-input-bg,rgba(60,181,124,.08));}
.cal-day.is-today{border:1px solid var(--primary);font-weight:700;}
.cal-day.is-selected{background:var(--primary);color:#fff;}
.cal-day.is-selected .day-dots .dot{background:#fff !important;}
.day-num{line-height:1;}
.day-dots{display:flex;gap:2px;margin-top:3px;height:5px;}
.dot{width:5px;height:5px;border-radius:50%;display:inline-block;}
.dot-upcoming{background-color:var(--primary);}
.dot-completed{background-color:#0dcaf0;}
.dot-cancelled{background-color:#e74c3c;}
.cal-legend{display:flex;flex-wrap:wrap;gap:.9rem;margin-top:1rem;padding-top:.9rem;border-top:1px solid var(--border-color);}
.legend-item{display:flex;align-items:center;gap:5px;font-size:.72rem;color:var(--text-muted);}
.legend-item .dot{width:6px;height:6px;}
@media (max-width:400px){
  .cal-day{font-size:.72rem;}
  .cal-month-label{min-width:90px;font-size:.78rem;}
}
</style>

<script>
(function () {
    const wrap = document.getElementById('sideCalendar');
    if (!wrap) return;

    const events = JSON.parse(wrap.dataset.events || '{}');
    const grid = document.getElementById('calGrid');
    const monthLabel = document.getElementById('calMonthLabel');
    const prevBtn = document.getElementById('calPrev');
    const nextBtn = document.getElementById('calNext');

    const today = new Date();
    let viewDate = new Date(today.getFullYear(), today.getMonth(), 1);
    let selectedKey = null;

    const monthNames = ['January','February','March','April','May','June','July','August','September','October','November','December'];

    function fmtKey(y, m, d) {
        return `${y}-${String(m + 1).padStart(2,'0')}-${String(d).padStart(2,'0')}`;
    }

    function render() {
        const y = viewDate.getFullYear();
        const m = viewDate.getMonth();
        monthLabel.textContent = `${monthNames[m]} ${y}`;

        const firstDay = new Date(y, m, 1).getDay();
        const daysInMonth = new Date(y, m + 1, 0).getDate();
        const daysInPrevMonth = new Date(y, m, 0).getDate();

        grid.innerHTML = '';
        const totalCells = Math.ceil((firstDay + daysInMonth) / 7) * 7;

        for (let i = 0; i < totalCells; i++) {
            const cell = document.createElement('div');
            let dayNum, cellY = y, cellM = m, isOutside = false;

            if (i < firstDay) {
                dayNum = daysInPrevMonth - firstDay + i + 1;
                cellM = m - 1; isOutside = true;
            } else if (i >= firstDay + daysInMonth) {
                dayNum = i - firstDay - daysInMonth + 1;
                cellM = m + 1; isOutside = true;
            } else {
                dayNum = i - firstDay + 1;
            }
            if (cellM < 0) { cellM = 11; cellY -= 1; }
            if (cellM > 11) { cellM = 0; cellY += 1; }

            const key = fmtKey(cellY, cellM, dayNum);
            const dayEvents = events[key];

            cell.className = 'cal-day' + (isOutside ? ' is-outside' : '') + (dayEvents ? ' has-event' : '');
            if (!isOutside && cellY === today.getFullYear() && cellM === today.getMonth() && dayNum === today.getDate()) {
                cell.classList.add('is-today');
            }
            if (key === selectedKey) cell.classList.add('is-selected');

            let dotsHtml = '';
            if (dayEvents) {
                if (dayEvents.upcoming) dotsHtml += '<span class="dot dot-upcoming"></span>';
                if (dayEvents.completed) dotsHtml += '<span class="dot dot-completed"></span>';
                if (dayEvents.cancelled) dotsHtml += '<span class="dot dot-cancelled"></span>';
            }

            cell.innerHTML = `<span class="day-num">${dayNum}</span><span class="day-dots">${dotsHtml}</span>`;

            if (dayEvents) {
                cell.addEventListener('click', () => {
                    selectedKey = (selectedKey === key) ? null : key;
                    render();
                    wrap.dispatchEvent(new CustomEvent('calendar:select', { detail: { date: key, events: dayEvents } }));
                });
            }

            grid.appendChild(cell);
        }
    }

    prevBtn.addEventListener('click', () => {
        viewDate = new Date(viewDate.getFullYear(), viewDate.getMonth() - 1, 1);
        render();
    });
    nextBtn.addEventListener('click', () => {
        viewDate = new Date(viewDate.getFullYear(), viewDate.getMonth() + 1, 1);
        render();
    });

    render();
})();
</script>