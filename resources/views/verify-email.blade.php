<x-layout.app title="تایید ایمیل" style="verifyEmail">
<body class="verify-page">
  
    <div class="verify-card">
      <h2>تأیید ایمیل</h2>
      <p>برای ادامه به تایید شدن ایمیل شما نیاز داریم!</p>
      <p>برای شما لینک تایید ایمیل ارسال شده. لطفا روی لینک ارسال شده کلیک کنید</p>
      <form method="POST" action="/email/verify">
        @csrf
      </form>
  
      <div class="timer">
        <span id="resendText">ارسال مجدد کد تا <span id="countdown">30</span> ثانیه دیگر</span>
        <button id="resendBtn" style="display:none;" onclick="resendCode()">ارسال مجدد</button>
      </div>
    </div>
  
    <script>
      let timer = 30;
      const countdown = document.getElementById('countdown');
      const resendBtn = document.getElementById('resendBtn');
      const resendText = document.getElementById('resendText');
  
      const interval = setInterval(() => {
        timer--;
        countdown.textContent = timer;
        if (timer <= 0) {
          clearInterval(interval);
          resendText.style.display = 'none';
          resendBtn.style.display = 'inline-block';
        }
      }, 1000);
  
      function resendCode() {
        resendBtn.disabled = true;
        resendBtn.textContent = 'ارسال شد!';
        // می‌تونی اینجا AJAX یا فرم POST برای ارسال مجدد بزنی
      }
    </script>
  </body>
</x-layout.app>