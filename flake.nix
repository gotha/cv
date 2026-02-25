{
  description = "Minimalistic Python development environment";

  inputs = {
    nixpkgs.url = "github:NixOS/nixpkgs/nixos-25.05";
    flake-utils.url = "github:numtide/flake-utils";
  };

  outputs = { self, nixpkgs, flake-utils }:
    flake-utils.lib.eachDefaultSystem (system:
      let
        pkgs = nixpkgs.legacyPackages.${system};

        pythonEnv = pkgs.python3.withPackages
          (ps: with ps; [ pip virtualenv setuptools wheel pyyaml jinja2 ]);
      in {
        devShells.default = pkgs.mkShell {
          buildInputs = with pkgs; [
            pythonEnv
            python3Packages.pip
            python3Packages.virtualenv
          ];

          shellHook = ''
            VENV_DIR="''${XDG_CACHE_HOME:-$HOME/.cache}/cv-djlint-venv"
            if [ ! -d "$VENV_DIR" ]; then
              python3 -m venv "$VENV_DIR"
              "$VENV_DIR/bin/pip" install --quiet djlint
            fi
            export PATH="$VENV_DIR/bin:$PATH"
          '';
        };

        apps.format-html = {
          type = "app";
          program = toString (pkgs.writeShellScript "format-html" ''
            VENV_DIR="''${XDG_CACHE_HOME:-$HOME/.cache}/cv-djlint-venv"
            if [ ! -d "$VENV_DIR" ]; then
              ${pkgs.python3}/bin/python3 -m venv "$VENV_DIR"
              "$VENV_DIR/bin/pip" install --quiet djlint
            fi
            "$VENV_DIR/bin/djlint" src/template.html --reformat
          '');
        };

        apps.generate = {
          type = "app";
          program = toString (pkgs.writeShellScript "generate" ''
            ${pythonEnv}/bin/python src/generate.py data/profile.yaml > index.html
          '');
        };
      });
}
