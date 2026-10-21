<!doctype html>
<html lang="id">
<head>
<meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1">
<title>OBS Championship Leaderboard</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Chakra+Petch:ital,wght@0,600;0,700;0,800;0,900;1,700;1,800&family=Oxanium:wght@600;700;800;900&display=swap" rel="stylesheet">
<style>
:root{
  --blue-base:#38bdf8;
  --blue-bright:#00d2ff;
  --blue-glow:rgba(56,189,248,0.45);
  --panel:rgba(8,14,28,0.94);
  --panel-card:rgba(13,22,42,0.8);
  --row-bg:rgba(18,30,56,0.88);
  --row-border:rgba(56,189,248,0.18);
  --gold:#fbbf24;
  --silver:#e2e8f0;
  --bronze:#fb923c;
  --text:#f8fafc;
  --muted:#94a3b8;
}
*{box-sizing:border-box}
html,body{margin:0;width:100%;height:100%;background:transparent;overflow:hidden;font-family:'Chakra Petch','Segoe UI',sans-serif;color:var(--text)}
body{padding:20px;display:flex;justify-content:center;align-items:flex-start}

.board{
  position:relative;
  width:1260px;
  max-width:100%;
  background:var(--panel);
  border:1px solid rgba(56,189,248,0.35);
  border-radius:14px;
  overflow:hidden;
  box-shadow:0 4px 12px rgba(0,0,0,0.45);
  backdrop-filter:blur(12px);
}

/* TOP RACING HATCH STRIPES */
.topline{
  height:6px;
  background:repeating-linear-gradient(
    -45deg,
    var(--blue-bright) 0,
    var(--blue-bright) 10px,
    #0284c7 10px,
    #0284c7 20px,
    #facc15 20px,
    #facc15 26px,
    #0284c7 26px,
    #0284c7 36px
  );
  box-shadow:0 0 14px var(--blue-glow);
}

/* ESPORTS HEADER */
header{
  position:relative;
  display:flex;
  align-items:center;
  justify-content:space-between;
  padding:15px 24px 13px;
  background:linear-gradient(180deg,rgba(56,189,248,0.1) 0%,rgba(8,14,28,0.4) 100%);
  border-bottom:1px solid rgba(56,189,248,0.22);
}
.header-left{display:flex;align-items:center;gap:18px}
.cross-grid{
  display:grid;
  grid-template-columns:repeat(4,8px);
  gap:3px;
  color:var(--blue-base);
  font-size:9px;
  line-height:8px;
  font-weight:900;
  opacity:0.75;
  user-select:none;
}
.eyebrow{
  display:flex;
  align-items:center;
  gap:8px;
  font-family:'Oxanium',sans-serif;
  font-size:11px;
  letter-spacing:2.5px;
  color:var(--blue-base);
  font-weight:800;
  text-transform:uppercase;
  text-shadow:0 0 8px rgba(56,189,248,0.5);
}
.eyebrow::before{
  content:"///";
  color:#facc15;
  font-weight:900;
}
h1{
  font-family:'Oxanium',sans-serif;
  font-size:25px;
  line-height:1.1;
  margin:4px 0 0;
  font-weight:900;
  letter-spacing:1.5px;
  text-transform:uppercase;
  background:linear-gradient(180deg,#ffffff 25%,#bae6fd 100%);
  -webkit-background-clip:text;
  -webkit-text-fill-color:transparent;
  filter:drop-shadow(0 2px 10px rgba(56,189,248,0.35));
}

.header-right{
  display:flex;
  align-items:center;
  gap:12px;
}

.scroll-toggle-btn{
  display:flex;
  align-items:center;
  gap:8px;
  background:rgba(56,189,248,0.12);
  border:1px solid rgba(56,189,248,0.38);
  clip-path:polygon(8px 0,100% 0,calc(100% - 8px) 100%,0 100%);
  padding:6px 14px;
  color:var(--blue-base);
  font-family:'Oxanium',sans-serif;
  font-size:11px;
  font-weight:900;
  letter-spacing:1.2px;
  cursor:pointer;
  outline:none;
  transition:all .25s ease;
  user-select:none;
}
.scroll-toggle-btn:hover{
  background:rgba(56,189,248,0.22);
  border-color:rgba(56,189,248,0.7);
  box-shadow:0 0 12px rgba(56,189,248,0.35);
}
.scroll-toggle-btn.paused{
  background:rgba(239,68,68,0.14);
  border-color:rgba(239,68,68,0.5);
  color:#f87171;
}
.scroll-dot{
  width:7px;
  height:7px;
  border-radius:50%;
  background:var(--blue-base);
  box-shadow:0 0 8px var(--blue-base);
  transition:all .25s ease;
}
.scroll-toggle-btn.paused .scroll-dot{
  background:#f87171;
  box-shadow:0 0 8px #f87171;
}

.live{
  display:flex;
  align-items:center;
  gap:8px;
  font-family:'Oxanium',sans-serif;
  color:#a7f3d0;
  background:rgba(16,185,129,0.15);
  border:1px solid rgba(16,185,129,0.45);
  clip-path:polygon(8px 0,100% 0,calc(100% - 8px) 100%,0 100%);
  padding:6px 14px;
  font-size:11px;
  font-weight:900;
  letter-spacing:1.5px;
  box-shadow:0 0 15px rgba(16,185,129,0.25);
}
.dot{width:8px;height:8px;border-radius:50%;background:#34d399;box-shadow:0 0 10px #34d399;animation:pulse 1.4s infinite}

/* GROUPS GRID */
#groups{
  display:grid;
  grid-template-columns:repeat(2,minmax(0,1fr));
  gap:22px;
  padding:16px 22px 14px;
}

/* GROUP CONTAINER */
.group{
  position:relative;
  display:flex;
  flex-direction:column;
  background:var(--panel-card);
  border:1px solid var(--row-border);
  border-radius:12px;
  padding:12px 14px 10px;
  box-shadow:inset 0 0 20px rgba(56,189,248,0.04),0 8px 24px rgba(0,0,0,0.35);
}
.group::before{
  content:"";
  position:absolute;
  top:0;
  left:0;
  width:40px;
  height:3px;
  background:var(--blue-base);
  box-shadow:0 0 10px var(--blue-base);
}

.group-title{
  display:flex;
  align-items:center;
  gap:10px;
  font-family:'Oxanium',sans-serif;
  padding:2px 4px 6px;
  color:var(--blue-base);
  font-size:14px;
  letter-spacing:2px;
  font-weight:900;
  text-transform:uppercase;
}
.group-title:after{
  content:"";
  height:2px;
  flex:1;
  background:linear-gradient(90deg,var(--blue-base),rgba(56,189,248,0.25),transparent);
}
.group-sub{
  display:inline-block;
  align-self:flex-start;
  font-family:'Oxanium',sans-serif;
  color:#facc15;
  background:rgba(250,204,21,0.12);
  border-left:3px solid #facc15;
  font-size:9px;
  font-weight:800;
  letter-spacing:1.2px;
  padding:2px 8px;
  margin:-2px 4px 8px;
  text-transform:uppercase;
}

.cols{
  display:grid;
  grid-template-columns:46px minmax(0,1fr) 105px 95px;
  gap:10px;
  padding:6px 12px;
  color:#64748b;
  font-family:'Oxanium',sans-serif;
  font-size:10px;
  letter-spacing:1.2px;
  font-weight:800;
  border-bottom:1px solid rgba(56,189,248,0.12);
  margin-bottom:6px;
}
.cols span:nth-child(3),.cols span:nth-child(4){text-align:right}

/* ENTRIES WRAPPER & SCROLLING */
.entries-wrap{
  position:relative;
}
.entries-wrap.scrollable{
  max-height:318px;
  overflow-y:auto;
  overflow-x:hidden;
  padding-right:4px;
  scrollbar-width:thin;
  scrollbar-color:rgba(56,189,248,0.45) transparent;
}
.entries-wrap.scrollable::-webkit-scrollbar{
  width:4px;
}
.entries-wrap.scrollable::-webkit-scrollbar-track{
  background:transparent;
}
.entries-wrap.scrollable::-webkit-scrollbar-thumb{
  background:rgba(56,189,248,0.45);
  border-radius:4px;
}
.entries-wrap.scrollable::-webkit-scrollbar-thumb:hover{
  background:rgba(56,189,248,0.85);
}

/* ENTRY ROW */
.entry{
  position:relative;
  display:grid;
  grid-template-columns:46px minmax(0,1fr) 105px 95px;
  gap:10px;
  align-items:center;
  min-height:52px;
  padding:6px 12px;
  margin:5px 0;
  background:var(--row-bg);
  border:1px solid var(--row-border);
  border-radius:8px;
  clip-path:polygon(6px 0,100% 0,calc(100% - 6px) 100%,0 100%);
  transition:transform 700ms cubic-bezier(.2,.8,.2,1),opacity 350ms ease,background 350ms ease,border-color 350ms ease,box-shadow 350ms ease;
  will-change:transform;
}

/* ANIMASI NAIK PERINGKAT / HIGHLIGHT */
@keyframes rankUpGlow {
  0% {
    filter: brightness(1);
    box-shadow: 0 0 0 rgba(56,189,248,0);
  }
  30% {
    filter: brightness(1.35);
    box-shadow: 0 0 24px rgba(56,189,248,0.85), inset 0 0 16px rgba(56,189,248,0.45);
  }
  100% {
    filter: brightness(1);
    box-shadow: 0 0 0 rgba(56,189,248,0);
  }
}
.entry.rank-up {
  position: relative;
  z-index: 10;
  animation: rankUpGlow 1.4s ease-out;
}

@keyframes scorePop {
  0% { transform: scale(1); filter: brightness(1); }
  35% { transform: scale(1.2); filter: brightness(1.6); color: #38bdf8; text-shadow: 0 0 14px #38bdf8; }
  100% { transform: scale(1); filter: brightness(1); }
}
.score.pop {
  animation: scorePop 1.2s ease-out;
}

/* 1ST PLACE - GOLD CHAMPION */
.entry.first{
  background:linear-gradient(90deg,rgba(251,191,36,0.2) 0%,rgba(18,30,56,0.96) 55%);
  border:1px solid rgba(251,191,36,0.6);
  box-shadow:inset 0 0 18px rgba(251,191,36,0.12),0 4px 16px rgba(0,0,0,0.35);
}
.entry.first .rank{
  background:linear-gradient(135deg,#facc15,#b45309);
  color:#0b1120;
  font-weight:900;
  border:1px solid #fef08a;
  box-shadow:0 0 12px rgba(250,204,21,0.5);
}
.entry.first .name{color:#ffffff}
.entry.first .score{
  color:#facc15;
  text-shadow:0 0 12px rgba(250,204,21,0.5);
}

/* 2ND PLACE - ICE SILVER */
.entry.second{
  background:linear-gradient(90deg,rgba(56,189,248,0.16) 0%,rgba(18,30,56,0.96) 55%);
  border:1px solid rgba(56,189,248,0.5);
  box-shadow:inset 0 0 14px rgba(56,189,248,0.08);
}
.entry.second .rank{
  background:linear-gradient(135deg,#e2e8f0,#475569);
  color:#0b1120;
  font-weight:900;
  border:1px solid #ffffff;
  box-shadow:0 0 10px rgba(226,232,240,0.4);
}
.entry.second .score{color:#e2e8f0}

/* 3RD PLACE - CYBER BRONZE / ORANGE */
.entry.third{
  background:linear-gradient(90deg,rgba(249,115,22,0.15) 0%,rgba(18,30,56,0.96) 55%);
  border:1px solid rgba(249,115,22,0.45);
}
.entry.third .rank{
  background:linear-gradient(135deg,#fb923c,#9a3412);
  color:#ffffff;
  font-weight:900;
  border:1px solid #fed7aa;
  box-shadow:0 0 10px rgba(249,115,22,0.4);
}
.entry.third .score{color:#fdba74}

/* RANK BADGE */
.rank{
  display:flex;
  align-items:center;
  justify-content:center;
  height:32px;
  width:36px;
  font-family:'Oxanium',sans-serif;
  font-size:16px;
  font-weight:900;
  color:var(--blue-base);
  background:rgba(8,14,28,0.85);
  border:1px solid rgba(56,189,248,0.3);
  border-radius:4px;
  clip-path:polygon(4px 0,100% 0,calc(100% - 4px) 100%,0 100%);
}

.name{
  min-width:0;
  font-size:15px;
  font-weight:800;
  white-space:nowrap;
  overflow:hidden;
  text-overflow:ellipsis;
  letter-spacing:0.4px;
  color:#f1f5f9;
  text-transform:uppercase;
}
.score{
  text-align:right;
  font-family:'Oxanium',sans-serif;
  font-size:20px;
  font-weight:900;
  font-variant-numeric:tabular-nums;
  color:#38bdf8;
  letter-spacing:0.5px;
  text-shadow:0 0 10px rgba(56,189,248,0.35);
}
.time{
  text-align:right;
  font-family:'Oxanium',sans-serif;
  color:#94a3b8;
  font-size:12px;
  font-weight:700;
  font-variant-numeric:tabular-nums;
  white-space:nowrap;
}
.empty{padding:22px 14px;color:var(--muted);font-size:13px;text-align:center;font-family:'Oxanium',sans-serif}

footer{
  display:flex;
  justify-content:space-between;
  align-items:center;
  gap:10px;
  padding:11px 24px 13px;
  background:rgba(4,9,18,0.85);
  border-top:1px solid rgba(56,189,248,0.2);
  color:#64748b;
  font-family:'Oxanium',sans-serif;
  font-size:11px;
  letter-spacing:1px;
}
#status{
  display:flex;
  align-items:center;
  gap:6px;
  color:var(--blue-base);
  font-weight:800;
  text-transform:uppercase;
}
#status:before{
  content:"●";
  color:#34d399;
  font-size:11px;
  text-shadow:0 0 6px #34d399;
}
#updated{font-weight:700;color:#94a3b8}
.error{color:#ff9eae!important}
@keyframes pulse{50%{opacity:.4;transform:scale(.85)}}
</style></head>
<body>
<section class="board"><div class="topline"></div>
<header>
  <div class="header-left">
    <div class="cross-grid">
      <span>+</span><span>+</span><span>+</span><span>+</span>
      <span>+</span><span>+</span><span>+</span><span>+</span>
      <span>+</span><span>+</span><span>+</span><span>+</span>
    </div>
    <div>
      <div class="eyebrow">ARTECT Robot Competition</div>
      <h1>LEADERBOARD KUALIFIKASI</h1>
    </div>
  </div>
  <div class="header-right">
    <button id="scrollToggle" class="scroll-toggle-btn" title="Klik atau tekan tombol 'S' untuk ON/OFF Auto Scroll (Sesi Juara)">
      <span class="scroll-dot"></span>
      <span id="scrollToggleText">SCROLL: ON</span>
    </button>
    <div class="live"><span class="dot"></span> LIVE</div>
  </div>
</header>
<div id="groups"><div class="empty">Hubungkan Google Sheets untuk menampilkan peringkat.</div></div>
<footer><span id="status">MENUNGGU DATA</span><span id="updated">AUTO UPDATE • 5 DETIK</span></footer></section>
<script>
// =========================================================================
// 📌 [PENGATURAN GOOGLE SHEETS KUALIFIKASI]
// =========================================================================
const SHEET_BASE_URL = "https://docs.google.com/spreadsheets/d/1TMTYwdEk3BFC8sejhZrJzS1lZxJ58Y1KhJRwTz4_o6o";
const SHEET_LOWER_NAME = "Lower Kualifikasi";
const SHEET_UPPER_NAME = "Upper Kualifikasi";

// Interval refresh otomatis (5000 = 5 detik)
const REFRESH_MS = 5000;

// Batas maksimal tim yang ditampilkan per kelas (akan otomatis scroll jika > 5 tim)
const MAX_TEAMS_PER_CLASS = 50;
const groupsEl=document.getElementById("groups"),statusEl=document.getElementById("status"),updatedEl=document.getElementById("updated");
let lastSignature="";

function parseCSV(text){const out=[];let row=[],cell="",quoted=false;for(let i=0;i<text.length;i++){const c=text[i],n=text[i+1];if(c==='"'&&quoted&&n==='"'){cell+='"';i++}else if(c==='"')quoted=!quoted;else if(c===','&&!quoted){row.push(cell);cell=""}else if((c==='\n'||c==='\r')&&!quoted){if(c==='\r'&&n==='\n')i++;row.push(cell);if(row.some(v=>v.trim()!==""))out.push(row);row=[];cell=""}else cell+=c}row.push(cell);if(row.some(v=>v.trim()!==""))out.push(row);return out}
function norm(s){return String(s||"").trim().toLowerCase()}

// Parse Sisa Waktu menjadi detik (semakin besar detiknya, semakin baik peringkatnya)
function parseTimeToSeconds(t){
  if(!t) return 0;
  const s = String(t).trim();
  if(!s || s === "-" || s === "—") return 0;
  const parts = s.replace(".", ":").split(":").map(Number);
  if(parts.some(isNaN)){
    const num = Number(s);
    return isNaN(num) ? 0 : num;
  }
  if(parts.length === 3) return parts[0] * 3600 + parts[1] * 60 + parts[2];
  if(parts.length === 2) return parts[0] * 60 + parts[1];
  if(parts.length === 1) return parts[0];
  return 0;
}

function findCol(header, patterns){
  for(const p of patterns){
    const idx = header.findIndex(c => c.includes(p) && !c.includes("bonus") && !c.includes("misi"));
    if(idx !== -1) return idx;
  }
  return -1;
}

function parseSheetData(csvText, clsKey){
  const m = parseCSV(csvText.replace(/^\uFEFF/,""));
  if (m.length < 2) return [];

  let headerRowIdx = -1;
  for(let r = 0; r < Math.min(5, m.length); r++){
    const row = m[r].map(norm);
    if(row.some(c => c.includes("nama") || c.includes("tim"))){
      headerRowIdx = r;
      break;
    }
  }
  if(headerRowIdx === -1) headerRowIdx = 0;

  const header = m[headerRowIdx].map(norm);
  let nameCol = findCol(header, ["nama tim", "nama", "tim", "team"]);
  let scoreCol = findCol(header, ["total point", "total poin", "total", "skor total", "point", "poin", "nilai", "skor"]);
  let timeCol = findCol(header, ["sisa waktu", "sisa", "waktu", "time"]);

  // Fallbacks: Col B (1) = Nama TIM, Col G (6) = Total Point, Col I (8) = Sisa Waktu
  if(nameCol === -1) nameCol = 1;
  if(scoreCol === -1) scoreCol = 6;
  if(timeCol === -1) timeCol = 8;

  const results = [];
  const rows = m.slice(headerRowIdx + 1);

  rows.forEach((r, idx) => {
    const name = (r[nameCol] || "").trim();
    if(!name || norm(name) === "nama tim") return;

    const scoreRaw = (r[scoreCol] || "0").trim().replace(/\s/g, "").replace(/\.(?=\d{3}(\D|$))/g, "").replace(",", ".");
    const score = Number(scoreRaw) || 0;
    const timeRaw = (r[timeCol] || "").trim();
    const timeSec = parseTimeToSeconds(timeRaw);

    results.push({
      cls: clsKey,
      name: name,
      score: score,
      time: timeRaw || "00:00",
      timeSec: timeSec,
      key: clsKey + "::" + name.toLowerCase() + "::" + (idx + 1)
    });
  });

  return results;
}

const groupCards = new Map();
const scrollControllers = new Map();

// Kontrol On/Off Auto Scroll (Sesi Juara / Umum)
let isAutoScrollEnabled = true;

const scrollParam = new URLSearchParams(window.location.search).get("scroll");
if (scrollParam === "0" || scrollParam === "off" || scrollParam === "false") {
  isAutoScrollEnabled = false;
}

function updateScrollToggleUI() {
  const btn = document.getElementById("scrollToggle");
  const txt = document.getElementById("scrollToggleText");
  if (!btn) return;
  if (isAutoScrollEnabled) {
    btn.classList.remove("paused");
    btn.title = "Auto-Scroll AKTIF. Klik atau tekan 'S' untuk menjeda di posisi juara.";
    if (txt) txt.textContent = "SCROLL: ON";
  } else {
    btn.classList.add("paused");
    btn.title = "Auto-Scroll JEDA (Posisi Juara). Klik atau tekan 'S' untuk melanjutkan.";
    if (txt) txt.textContent = "SCROLL: OFF (JUARA)";
  }
}

function setAutoScroll(enabled) {
  isAutoScrollEnabled = enabled;
  updateScrollToggleUI();

  scrollControllers.forEach((state, wrap) => {
    state.isPaused = !isAutoScrollEnabled;
    if (!isAutoScrollEnabled) {
      state.currentScroll = 0;
      wrap.scrollTo({ top: 0, behavior: "smooth" });
    } else {
      state.lastTime = performance.now();
    }
  });
}

function ensureAutoScroll(wrap){
  if (scrollControllers.has(wrap)) return;

  const state = {
    direction: 1, // 1 = turun, -1 = naik
    isPaused: !isAutoScrollEnabled,
    animId: null,
    pauseTimeout: null,
    lastTime: performance.now(),
    currentScroll: wrap.scrollTop || 0,
    speed: 32 // Kecepatan pelan, halus dan stabil (pixel/detik)
  };

  function step(now){
    if (!wrap.isConnected) {
      scrollControllers.delete(wrap);
      return;
    }

    const dt = Math.min((now - state.lastTime) / 1000, 0.1);
    state.lastTime = now;

    const maxScroll = Math.max(0, wrap.scrollHeight - wrap.clientHeight);

    if (maxScroll <= 4 || state.isPaused || !isAutoScrollEnabled) {
      state.animId = requestAnimationFrame(step);
      return;
    }

    if (state.direction === 1) {
      // Scroll pelan ke bawah dengan accumulator presisi sub-pixel
      state.currentScroll += state.speed * dt;
      if (state.currentScroll >= maxScroll) {
        state.currentScroll = maxScroll;
        wrap.scrollTop = maxScroll;
        state.direction = -1;
        state.isPaused = true;
        // Mentok di bawah: jeda 2.5 detik
        state.pauseTimeout = setTimeout(() => {
          state.isPaused = false;
          state.lastTime = performance.now();
        }, 2500);
      } else {
        wrap.scrollTop = Math.round(state.currentScroll);
      }
    } else {
      // Scroll pelan ke atas
      state.currentScroll -= state.speed * dt;
      if (state.currentScroll <= 0) {
        state.currentScroll = 0;
        wrap.scrollTop = 0;
        state.direction = 1;
        state.isPaused = true;
        // Mentok di atas: jeda 3 detik
        state.pauseTimeout = setTimeout(() => {
          state.isPaused = false;
          state.lastTime = performance.now();
        }, 3000);
      } else {
        wrap.scrollTop = Math.round(state.currentScroll);
      }
    }

    state.animId = requestAnimationFrame(step);
  }

  // Jeda awal 2 detik di posisi atas sebelum mulai bergulir ke bawah jika auto scroll aktif
  if (isAutoScrollEnabled) {
    state.isPaused = true;
    state.pauseTimeout = setTimeout(() => {
      if (isAutoScrollEnabled) {
        state.isPaused = false;
        state.lastTime = performance.now();
      }
    }, 2000);
  }

  state.animId = requestAnimationFrame(step);
  scrollControllers.set(wrap, state);
}

function render(data){
  const classDefs = [
    { key: "lower", title: "LOWER CLASS", sub: "SD" },
    { key: "upper", title: "UPPER CLASS", sub: "SMP" }
  ];
  const extra = [...new Set(data.map(x => x.cls))].filter(c => !["lower", "upper"].includes(c.toLowerCase())).sort();
  extra.forEach(c => classDefs.push({ key: c.toLowerCase(), title: c.toUpperCase() + " CLASS", sub: "" }));

  const grouped = classDefs.map(g => ({
    ...g,
    items: data.filter(x => x.cls.toLowerCase() === g.key)
      .sort((a, b) => (b.score - a.score) || (a.timeSec - b.timeSec) || a.name.localeCompare(b.name))
      .slice(0, MAX_TEAMS_PER_CLASS)
  }));

  const signature = JSON.stringify(grouped.map(g => [g.key, g.items.map((x, i) => [x.key, x.score, x.time, i])]));
  if (signature === lastSignature) return;

  // Bersihkan teks pesan awal "Hubungkan Google Sheets..." jika ada
  const emptyInitial = groupsEl.querySelector(".empty");
  if (emptyInitial && emptyInitial.parentElement === groupsEl) {
    emptyInitial.remove();
  }

  grouped.forEach(g => {
    let card = groupCards.get(g.key);
    if (!card) {
      const sec = document.createElement("section");
      sec.className = "group";
      const title = document.createElement("div");
      title.className = "group-title";
      sec.appendChild(title);
      const sub = document.createElement("div");
      sub.className = "group-sub";
      sec.appendChild(sub);
      const colHead = document.createElement("div");
      colHead.className = "cols";
      colHead.innerHTML = "<span>RANK</span><span>NAMA TIM</span><span>TOTAL POINT</span><span>SISA WAKTU</span>";
      sec.appendChild(colHead);
      const wrap = document.createElement("div");
      wrap.className = "entries-wrap";
      sec.appendChild(wrap);
      groupsEl.appendChild(sec);
      card = { sec, wrap, title, sub };
      groupCards.set(g.key, card);
    }

    card.title.textContent = g.title;
    if (g.sub) {
      card.sub.style.display = "";
      card.sub.textContent = g.sub;
    } else {
      card.sub.style.display = "none";
    }

    const { wrap } = card;

    if (!g.items.length) {
      wrap.className = "entries-wrap";
      wrap.innerHTML = '<div class="empty">Belum ada tim</div>';
      return;
    }

    const emptyMsg = wrap.querySelector(".empty");
    if (emptyMsg) emptyMsg.remove();

    // Jika lebih dari 5 tim, aktifkan scroll otomatis
    if (g.items.length > 5) {
      wrap.classList.add("scrollable");
      ensureAutoScroll(wrap);
    } else {
      wrap.classList.remove("scrollable");
      const ctrl = scrollControllers.get(wrap);
      if (ctrl) {
        if (ctrl.animId) cancelAnimationFrame(ctrl.animId);
        if (ctrl.pauseTimeout) clearTimeout(ctrl.pauseTimeout);
        scrollControllers.delete(wrap);
      }
      wrap.scrollTop = 0;
    }

    const oldEntries = [...wrap.querySelectorAll(".entry")];
    const oldTops = new Map(oldEntries.map(e => [e.dataset.key, e.getBoundingClientRect().top]));
    const existingEntries = new Map(oldEntries.map(e => [e.dataset.key, e]));
    const currentKeys = new Set(g.items.map(it => it.key));

    // Hapus baris yang sudah dihapus dari spreadsheet
    existingEntries.forEach((el, k) => {
      if (!currentKeys.has(k)) el.remove();
    });

    // Perbarui urutan baris tanpa mereset posisi scroll
    g.items.forEach((it, i) => {
      let e = existingEntries.get(it.key);
      if (!e) {
        e = document.createElement("div");
        e.className = "entry";
        e.dataset.key = it.key;
        e.innerHTML = '<div class="rank"></div><div class="name"></div><div class="score"></div><div class="time"></div>';
        e.style.opacity = "0";
      }

      e.classList.remove("first", "second", "third");
      if (i === 0) e.classList.add("first");
      else if (i === 1) e.classList.add("second");
      else if (i === 2) e.classList.add("third");

      e.querySelector(".rank").textContent = String(i + 1).padStart(2, "0");
      e.querySelector(".name").textContent = it.name;

      const scoreEl = e.querySelector(".score");
      const prevScore = e.dataset.score;
      if (prevScore !== undefined && prevScore !== String(it.score)) {
        scoreEl.classList.remove("pop");
        void scoreEl.offsetWidth;
        scoreEl.classList.add("pop");
        setTimeout(() => scoreEl.classList.remove("pop"), 1200);
      }
      e.dataset.score = String(it.score);
      scoreEl.textContent = it.score.toLocaleString("id-ID");

      e.querySelector(".time").textContent = it.time || "—";

      wrap.appendChild(e);
    });

    // Jalankan FLIP animasi untuk baris yang berpindah posisi / naik peringkat
    const movingEls = [];
    wrap.querySelectorAll(".entry").forEach(e => {
      const oldTop = oldTops.get(e.dataset.key);
      if (oldTop !== undefined) {
        const nowTop = e.getBoundingClientRect().top;
        const dy = oldTop - nowTop;
        if (Math.abs(dy) > 1) {
          e.style.transition = "none";
          e.style.transform = `translateY(${dy}px)`;
          if (dy > 0) {
            // Posisi lama di bawah, sekarang bergeser ke atas (naik peringkat)
            e.classList.remove("rank-up");
            void e.offsetWidth;
            e.classList.add("rank-up");
            setTimeout(() => e.classList.remove("rank-up"), 1400);
          }
          movingEls.push(e);
        }
        e.style.opacity = "1";
      } else {
        // Baris tim baru
        e.style.transition = "none";
        e.style.transform = "translateY(16px)";
        e.style.opacity = "0";
        movingEls.push(e);
      }
    });

    if (movingEls.length > 0) {
      void wrap.offsetHeight; // Force browser layout commit
      requestAnimationFrame(() => {
        requestAnimationFrame(() => {
          movingEls.forEach(e => {
            e.style.transition = "transform 700ms cubic-bezier(0.2, 0.8, 0.2, 1), opacity 350ms ease, background 350ms ease, border-color 350ms ease, box-shadow 350ms ease";
            e.style.transform = "";
            e.style.opacity = "1";
          });
        });
      });
    }
  });

  lastSignature = signature;
}

function getSheetCsvUrl(sheetName) {
  const enc = encodeURIComponent(sheetName);
  return `${SHEET_BASE_URL}/gviz/tq?tqx=out:csv&sheet=${enc}`;
}

async function fetchSheetCsv(sheetName) {
  const u = getSheetCsvUrl(sheetName) + "&t=" + Date.now();
  const res = await fetch(u, { cache: "no-store" });
  if (!res.ok) throw Error(`HTTP ${res.status} pada tab '${sheetName}'`);
  return await res.text();
}

async function refresh(){
  try {
    const [lowerCsv, upperCsv] = await Promise.all([
      fetchSheetCsv(SHEET_LOWER_NAME),
      fetchSheetCsv(SHEET_UPPER_NAME)
    ]);
    const lowerData = parseSheetData(lowerCsv, "lower");
    const upperData = parseSheetData(upperCsv, "upper");
    const combined = [...lowerData, ...upperData];
    if (!combined.length) throw Error("Belum ada data tim di spreadsheet.");
    render(combined);
    statusEl.textContent = `TERHUBUNG • ${lowerData.length} LOWER / ${upperData.length} UPPER`;
    statusEl.classList.remove("error");
    updatedEl.textContent = "DIPERBARUI " + new Date().toLocaleTimeString("id-ID", { hour: "2-digit", minute: "2-digit", second: "2-digit" });
  } catch(e) {
    statusEl.textContent = "GAGAL MEMBACA DATA";
    statusEl.classList.add("error");
    updatedEl.textContent = e.message.slice(0, 45);
    console.error(e);
  }
}
refresh();setInterval(refresh,REFRESH_MS);

// Tombol dan shortcut keyboard untuk ON/OFF Auto Scroll (Sesi Juara)
const scrollBtn = document.getElementById("scrollToggle");
if (scrollBtn) {
  scrollBtn.addEventListener("click", () => setAutoScroll(!isAutoScrollEnabled));
}
updateScrollToggleUI();

window.addEventListener("keydown", (ev) => {
  if (ev.key.toLowerCase() === "s" || ev.code === "Space") {
    if (ev.target.tagName !== "INPUT" && ev.target.tagName !== "TEXTAREA") {
      ev.preventDefault();
      setAutoScroll(!isAutoScrollEnabled);
    }
  }
});
</script></body></html>