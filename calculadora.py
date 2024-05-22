import tkinter as tk
from tkinter import messagebox
import math
import matplotlib.pyplot as plt
import numpy as np

class CalculadoraNovedosa:
    def __init__(self, root):
        self.root = root
        self.root.title("Calculadora")
        self.root.geometry("400x600")

        self.expresion = ""
        self.historial = []

        self.text_input = tk.StringVar()
        
        self.create_widgets()

    def create_widgets(self):
        # Display
        display_frame = tk.Frame(self.root)
        display_frame.pack()

        self.display = tk.Entry(display_frame, font=('arial', 20, 'bold'), textvariable=self.text_input, bd=30, insertwidth=4, bg="powder blue", justify='right')
        self.display.grid(columnspan=4)

        # Buttons
        button_frame = tk.Frame(self.root)
        button_frame.pack()

        buttons = [
            ('7', 1, 0), ('8', 1, 1), ('9', 1, 2), ('/', 1, 3),
            ('4', 2, 0), ('5', 2, 1), ('6', 2, 2), ('*', 2, 3),
            ('1', 3, 0), ('2', 3, 1), ('3', 3, 2), ('-', 3, 3),
            ('0', 4, 0), ('.', 4, 1), ('+', 4, 2), ('=', 4, 3),
            ('C', 5, 0), ('sin', 5, 1), ('cos', 5, 2), ('tan', 5, 3),
            ('Hist', 6, 0), ('Graph', 6, 1, 4)
        ]

        for (text, row, col, *colspan) in buttons:
            if colspan:
                button = tk.Button(button_frame, text=text, padx=20, pady=20, bd=8, fg="black", font=('arial', 20, 'bold'), command=lambda t=text: self.button_click(t))
                button.grid(row=row, column=col, columnspan=colspan[0], sticky="nsew")
            else:
                button = tk.Button(button_frame, text=text, padx=20, pady=20, bd=8, fg="black", font=('arial', 20, 'bold'), command=lambda t=text: self.button_click(t))
                button.grid(row=row, column=col)

        for i in range(7):
            button_frame.rowconfigure(i, weight=1)
            button_frame.columnconfigure(i, weight=1)

    def button_click(self, button):
        if button == 'C':
            self.expresion = ""
            self.text_input.set(self.expresion)
        elif button == '=':
            try:
                resultado = str(eval(self.expresion))
                self.historial.append(f"{self.expresion} = {resultado}")
                self.text_input.set(resultado)
                self.expresion = resultado
            except Exception as e:
                messagebox.showerror("Error", "Entrada inválida")
                self.expresion = ""
                self.text_input.set("")
        elif button in ['sin', 'cos', 'tan']:
            try:
                if self.expresion:
                    angle = float(self.expresion)
                    if button == 'sin':
                        resultado = str(math.sin(math.radians(angle)))
                    elif button == 'cos':
                        resultado = str(math.cos(math.radians(angle)))
                    elif button == 'tan':
                        resultado = str(math.tan(math.radians(angle)))
                    self.historial.append(f"{button}({angle}) = {resultado}")
                    self.text_input.set(resultado)
                    self.expresion = resultado
            except Exception as e:
                messagebox.showerror("Error", "Entrada inválida")
                self.expresion = ""
                self.text_input.set("")
        elif button == 'Hist':
            historial_texto = "\n".join(self.historial)
            messagebox.showinfo("Historial", historial_texto)
        elif button == 'Graph':
            self.open_graph_window()
        else:
            self.expresion += str(button)
            self.text_input.set(self.expresion)

    def open_graph_window(self):
        graph_window = tk.Toplevel(self.root)
        graph_window.title("Graficar Función")
        graph_window.geometry("400x200")

        tk.Label(graph_window, text="Ingrese la función en términos de x:").pack()
        self.funcion_input = tk.Entry(graph_window, font=('arial', 20, 'bold'), bd=10, insertwidth=2, width=14, bg="powder blue", justify='right')
        self.funcion_input.pack()

        tk.Button(graph_window, text="Graficar", padx=10, pady=10, bd=8, fg="black", font=('arial', 20, 'bold'), command=self.graficar).pack()

    def graficar(self):
        funcion = self.funcion_input.get()
        x = np.linspace(-10, 10, 400)
        try:
            y = eval(funcion)
            plt.figure("Gráfico de la función")
            plt.plot(x, y)
            plt.title(f"Gráfico de {funcion}")
            plt.xlabel('x')
            plt.ylabel('f(x)')
            plt.grid(True)
            plt.show()
        except Exception as e:
            messagebox.showerror("Error", f"Entrada inválida para la función: {e}")

# Ejecución de la interfaz gráfica
if __name__ == "__main__":
    root = tk.Tk()
    app = CalculadoraNovedosa(root)
    root.mainloop()
