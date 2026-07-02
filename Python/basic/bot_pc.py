import os
import psutil
import pyautogui
import pyttsx3
import time
import threading
import socket
import ctypes
from telegram import Update
from telegram.ext import ApplicationBuilder, CommandHandler, ContextTypes, MessageHandler, filters
from functools import wraps

TOKEN = ""
MEU_ID = ''

def run_speech(text):
    try:
        engine = pyttsx3.init()
        engine.say(text)
        engine.runAndWait()
    except:
        pass

def restrito(func):
    @wraps(func)
    async def wrapper(update: Update, context: ContextTypes.DEFAULT_TYPE, *args, **kwargs):
        if update.effective_user.id == MEU_ID:
            return await func(update, context, *args, **kwargs)
        else:
            await update.message.reply_text("[ACESSO NEGADO]")
            return
    return wrapper

@restrito
async def status(update: Update, context: ContextTypes.DEFAULT_TYPE):
    cpu = psutil.cpu_percent()
    ram = psutil.virtual_memory().percent
    battery = psutil.sensors_battery()
    bat_percent = battery.percent if battery else "N/A"
    hostname = socket.gethostname()
    ip_addr = socket.gethostbyname(hostname)

    msg = (f"[SISTEMA ONLINE]\n"
        f"Host: {hostname}\n"
        f"IP Local: {ip_addr}\n"
        f"CPU: {cpu}%\n"
        f"RAM: {ram}%\n"
        f"Bateria: {bat_percent}")
    await update.message.reply_text(msg)

@restrito
async def modo_hacker(update: Update, context: ContextTypes.DEFAULT_TYPE):
    await update.message.reply_text("[EXECUTANDO PROTOCOLO VISUAL...]")
    for _ in range(15):
        os.system('start "HACKER_MODE" cmd /k "color 0a && tree C:\\"')
        time.sleep(0.1)
    await update.message.reply_text("[PROTOCOLO ATIVO]")

@restrito
async def fechar_hacker(update: Update, context: ContextTypes.DEFAULT_TYPE):
    os.system('taskkill /F /FI "WINDOWTITLE eq HACKER_MODE*"')
    await update.message.reply_text("[TERMINAIS FECHADOS]")

@restrito
async def abrir_calc(update: Update, context: ContextTypes.DEFAULT_TYPE):
    os.system("calc")
    await update.message.reply_text("[APP: CALCULADORA INICIADO]")

@restrito
async def abrir_portal(update: Update, context: ContextTypes.DEFAULT_TYPE):
    os.system("start http://projetos/")
    await update.message.reply_text("[BROWSER: PORTAL ABERTO]")

@restrito
async def tirar_print(update: Update, context: ContextTypes.DEFAULT_TYPE):
    screenshot = pyautogui.screenshot()
    screenshot.save("screen_tmp.png")
    await update.message.reply_photo(photo=open("screen_tmp.png", "rb"))
    os.remove("screen_tmp.png")

@restrito
async def falar_pc(update: Update, context: ContextTypes.DEFAULT_TYPE):
    texto = " ".join(context.args)
    if not texto:
        await update.message.reply_text("[ERRO] Digite: /falar Texto")
        return

    threading.Thread(target=run_speech, args=(texto,)).start()
    await update.message.reply_text(f"[TTS] Falando: {texto}")

@restrito
async def bloquear_tela(update: Update, context: ContextTypes.DEFAULT_TYPE):
    ctypes.windll.user32.LockWorkStation()
    await update.message.reply_text("[SISTEMA BLOQUEADO]")

@restrito
async def minimizar_tudo(update: Update, context: ContextTypes.DEFAULT_TYPE):
    pyautogui.hotkey('win', 'd')
    await update.message.reply_text("[AREA DE TRABALHO EXIBIDA]")

@restrito
async def media_play(update: Update, context: ContextTypes.DEFAULT_TYPE):
    pyautogui.press("playpause")
    await update.message.reply_text("[MEDIA: PLAY/PAUSE]")

@restrito
async def media_next(update: Update, context: ContextTypes.DEFAULT_TYPE):
    pyautogui.press("nexttrack")
    await update.message.reply_text("[MEDIA: PROXIMO]")

@restrito
async def volume_up(update: Update, context: ContextTypes.DEFAULT_TYPE):
    pyautogui.press("volumeup", presses=5)
    await update.message.reply_text("[AUDIO: VOLUME +]")

@restrito
async def volume_down(update: Update, context: ContextTypes.DEFAULT_TYPE):
    pyautogui.press("volumedown", presses=5)
    await update.message.reply_text("[AUDIO: VOLUME -]")

@restrito
async def desligar_pc(update: Update, context: ContextTypes.DEFAULT_TYPE):
    os.system("shutdown /s /t 60")
    await update.message.reply_text("[ALERTA] DESLIGAMENTO EM 60s")

@restrito
async def cancelar_off(update: Update, context: ContextTypes.DEFAULT_TYPE):
    os.system("shutdown /a")
    await update.message.reply_text("[ALERTA] DESLIGAMENTO ABORTADO")

COMANDOS_MAPA = {
    "1":  {"cmd": "status",   "desc": "Info do Sistema", "func": status},
    "2":  {"cmd": "print",    "desc": "Captura Tela",    "func": tirar_print},
    "3":  {"cmd": "hacker",   "desc": "Efeito Visual",   "func": modo_hacker},
    "4":  {"cmd": "limpar",   "desc": "Fechar Efeito",   "func": fechar_hacker},
    "5":  {"cmd": "falar",    "desc": "Texto p/ Voz",    "func": falar_pc},
    "6":  {"cmd": "lock",     "desc": "Bloquear PC",     "func": bloquear_tela},
    "7":  {"cmd": "desktop",  "desc": "Minimizar Tudo",  "func": minimizar_tudo},
    "8":  {"cmd": "calc",     "desc": "Calculadora",     "func": abrir_calc},
    "9":  {"cmd": "portal",   "desc": "Abrir Projetos",  "func": abrir_portal},
    "10": {"cmd": "play",     "desc": "Media Play/Pause","func": media_play},
    "11": {"cmd": "next",     "desc": "Media Next",      "func": media_next},
    "12": {"cmd": "volup",    "desc": "Volume Aumentar", "func": volume_up},
    "13": {"cmd": "voldown",  "desc": "Volume Baixar",   "func": volume_down},
    "14": {"cmd": "off",      "desc": "Desligar (60s)",  "func": desligar_pc},
    "15": {"cmd": "cancelar", "desc": "Abortar Off",     "func": cancelar_off},
}

async def start(update: Update, context: ContextTypes.DEFAULT_TYPE):
    menu_texto = "CONTROL_DECK_V4\n------------------\n"
    for num, dados in COMANDOS_MAPA.items():
        menu_texto += f"{num} - {dados['desc']} (/{dados['cmd']})\n"

    menu_texto += "\n[AGUARDANDO COMANDO...]"
    await update.message.reply_text(menu_texto)

async def processar_texto(update: Update, context: ContextTypes.DEFAULT_TYPE):
    texto = update.message.text.strip()
    if texto in COMANDOS_MAPA:
        await COMANDOS_MAPA[texto]["func"](update, context)

if __name__ == '__main__':
    print("SYSTEM ONLINE - WAITING FOR TELEGRAM...")
    app = ApplicationBuilder().token(TOKEN).build()

    app.add_handler(CommandHandler("start", start))

    for dados in COMANDOS_MAPA.values():
        app.add_handler(CommandHandler(dados["cmd"], dados["func"]))

    app.add_handler(MessageHandler(filters.TEXT & ~filters.COMMAND, processar_texto))

    app.run_polling()
