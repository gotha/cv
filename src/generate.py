#!/usr/bin/env python3

import yaml
from jinja2 import Environment, FileSystemLoader, select_autoescape
import sys
from pathlib import Path


def load_yaml_data(yaml_file: str) -> dict:
    """Load data from YAML file."""
    try:
        with open(yaml_file, 'r', encoding='utf-8') as f:
            data = yaml.safe_load(f)
        return data
    except FileNotFoundError:
        print(f"Error: YAML file '{yaml_file}' not found.", file=sys.stderr)
        sys.exit(1)
    except yaml.YAMLError as e:
        print(f"Error parsing YAML file: {e}", file=sys.stderr)
        sys.exit(1)


def generate_html(template_file: str, data: dict):
    """Generate HTML from template and data."""
    try:
        # Set up Jinja2 environment
        template_dir = Path(template_file).parent
        template_name = Path(template_file).name

        env = Environment(
            loader=FileSystemLoader(
                template_dir if template_dir != Path('.') else '.'),
            autoescape=select_autoescape(['html', 'xml'])
        )

        # Load template
        template = env.get_template(template_name)

        # Render template with data
        html_output = template.render(**data)

        print(html_output)

    except Exception as e:
        print(f"Error generating HTML: {e}", file=sys.stderr)
        sys.exit(1)


def main():
    """Main function."""
    # Configuration
    yaml_file = './data/profile.yaml'
    template_file = Path(__file__).parent / 'template.html'

    # Allow command-line arguments to override defaults
    if len(sys.argv) > 1:
        yaml_file = sys.argv[1]

    data = load_yaml_data(yaml_file)

    generate_html(template_file, data)


if __name__ == '__main__':
    main()
