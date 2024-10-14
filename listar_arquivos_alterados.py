import os
import datetime
from pathlib import Path

def listar_arquivos_alterados_hoje():
    hoje = datetime.date.today()
    arquivos_alterados = []

    for raiz, diretorios, arquivos in os.walk('.'):
        for arquivo in arquivos:
            caminho_completo = Path(raiz) / arquivo
            data_modificacao = datetime.date.fromtimestamp(caminho_completo.stat().st_mtime)
            
            if data_modificacao == hoje:
                arquivos_alterados.append(str(caminho_completo))

    return arquivos_alterados

def salvar_lista_arquivos(arquivos):
    agora = datetime.datetime.now()
    nome_arquivo = agora.strftime("%Y-%m-%d_%H-%M-%S") + "_arquivos_alterados.txt"
    
    with open(nome_arquivo, 'w', encoding='utf-8') as f:
        for arquivo in arquivos:
            f.write(f"{arquivo}\n")
    
    return nome_arquivo

if __name__ == "__main__":
    arquivos_alterados = listar_arquivos_alterados_hoje()
    nome_arquivo_salvo = salvar_lista_arquivos(arquivos_alterados)
    print(f"Lista de arquivos alterados hoje foi salva em: {nome_arquivo_salvo}")
