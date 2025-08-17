document.addEventListener('DOMContentLoaded', function () {
	const bar = document.getElementById('announcement-bar');
	if (!bar) return;

	// Reset theo ngày: mỗi ngày sẽ hiện lại
	const today = new Date().toISOString().slice(0, 10); // YYYY-MM-DD
	const KEY = 'announceDismissed:' + today;

	if (localStorage.getItem(KEY)) {
		bar.style.display = 'none';
		return;
	}

	const btn = document.getElementById('announcement-close');
	if (btn) {
		btn.addEventListener('click', function () {
			localStorage.setItem(KEY, '1');
			bar.style.display = 'none';
		});
	}
});