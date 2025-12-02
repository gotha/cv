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
            echo "Python development environment activated"
            echo "Python version: $(python --version)"
          '';
        };
      });
}
